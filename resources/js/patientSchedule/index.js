import axios from "axios";
const closeNewEventModal = document.getElementById('closeNewEventModal');
const btnNewSched = document.getElementById('btnTeste');
let elmntPatient = document.getElementsByName('patient_name')[0];
let elmntEventDate = document.getElementsByName('patient_schedules_start_sched')[0];
let elmntSchedId = document.getElementsByName('sched_id')[0];
var calendar = null;
const calendarConfigs = {
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek, addEventButton' // user can switch between the two
    },
    eventTimeFormat: {
        hour: '2-digit',
        minute: '2-digit',
        meridiem: false,
        hour12: false
    },
    eventClick: async function(element) {
        let eventId = element.event.id;
        let arEvent = await getEvent(eventId);
        console.log(arEvent.data.schedule_id)
        elmntSchedId.value = arEvent.data.schedule_id;
        elmntPatient.value = arEvent.data.patient_name;
        elmntEventDate.value = arEvent.data.patient_schedules_start_sched;
        showModal('newSchedModal')
    },
    customButtons: {
        addEventButton: {
            text: 'Agendar',
            click: function() {
                showModal('newSchedModal')
            }
        }
    },
    locale: 'pt-br',
};

document.addEventListener("DOMContentLoaded", function(e) {

    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, calendarConfigs);
    calendar.render();

    closeNewEventModal.addEventListener('click', ()=>{
        hideModal('newSchedModal');
    });


    btnNewSched.addEventListener('click', ()=>{
        btnNewSched.disabled = true;
        createNewSched()
    })

    getEvents();

});

const getEvent = async function(eventId = '') {
    let arEvent = await axios({
        method: 'get',
        url: `/schedule/events/${eventId}`,
    });
    return arEvent;
}

const getEvents = async function() {
    let events = await axios({
        method: 'get',
        url: `/schedule/events`,
    });

    for (const key in events.data) {
        calendar.addEvent({
            backgroundColor: '#3252a8',
            id: events.data[key].schedule_id,
            title:  events.data[key].patient_name,
            start:  events.data[key].patient_schedules_start_sched,
            allDay: false,
        });
    }
}

$("#patientAutoComplete").autocomplete({
    source: function(request, response){
        $.ajax({
            type: 'get',
            url: `/patient/getPatient?patient_name=${elmntPatient.value}`,
            success: (patients)=>{
                response(patients.map((patient, i)=>{
                    return { 'label': patient.patient_name, 'id': patient.id };
                }));
            }
        })
    },
    classes: {
        "ui-autocomplete": "highlight"
    },
    minLength: 4,
    select: function( event, ui ) {
        const { id } = ui.item;
        elmntPatient.setAttribute('data-id', id);
    },
    delay: 300
});

const newSchedFormValidation = function({patient_id, patient_name, patient_schedules_start_sched}){
    let response = {
        patient_id,
        patient_schedules_start_sched,
        patient_schedules_active : 1
    };
    if (
        !patient_id
        || !patient_name
    ) {
        document.getElementsByName('patient_name')[0].classList.add('border-red-500');
        document.getElementById('patientError').classList.remove('hidden');
        response = null;
    }

    if (
        !patient_schedules_start_sched
    ) {
        document.getElementsByName('patient_schedules_start_sched')[0].classList.add('border-red-500');
        document.getElementById('schedDateError').classList.remove('hidden');
        response = null;
    }

    return response;
}

const createNewSched = async function(){

    const elmntPatient = document.getElementsByName('patient_name')[0];
    const elmntDateSched = document.getElementsByName('patient_schedules_start_sched')[0];

    const arSched = newSchedFormValidation({
        'patient_id' : elmntPatient.getAttribute('data-id'),
        'patient_name' : elmntPatient.value,
        'patient_schedules_start_sched' : elmntDateSched.value,
    });

    if (!arSched) {
        return;
    }

    let newSched = await axios({
        method: 'post',
        url: '/schedule/events/store',
        data: arSched
    });

    if (newSched.status != 200) {
        document.getElementById('modalError').classList.remove('hidden');
    }

    btnNewSched.disabled = false;
    hideModal('newSchedModal');
    document.getElementById('textModalSuccess').innerHTML = newSched.data;
    document.getElementById('modalSuccess').classList.remove('hidden');
    getEvents();

}
