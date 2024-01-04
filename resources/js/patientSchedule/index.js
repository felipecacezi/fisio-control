import axios from "axios";
const closeNewEventModal = document.getElementById('closeNewEventModal');
const btnNewSched = document.getElementById('btnTeste');
let elmntPatient = document.getElementsByName('patient_name')[0];
let elmntEventDate = document.getElementsByName('patient_schedules_start_sched')[0];
let elmntSchedId = document.getElementsByName('sched_id')[0];
var calendar = null;

document.addEventListener("DOMContentLoaded", function(e) {

    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
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
            elmntSchedId.value = arEvent.data[0].id;
            elmntPatient.value = arEvent.data[0].title;
            elmntPatient.setAttribute('data-id', arEvent.data[0].patient_id)
            elmntEventDate.value = arEvent.data[0].start;
            showModal('newSchedModal')
        },
        customButtons: {
            addEventButton: {
                text: 'Agendar',
                click: function() {
                    elmntPatient.value = '';
                    elmntPatient.setAttribute('data-id', '');
                    elmntEventDate.value = '';
                    showModal('newSchedModal')
                }
            }
        },
        locale: 'pt-br',
        eventSources: [
            {
                url: `/schedule/events`,
                method: 'GET',
            }
        ]
    });
    calendar.render();

    closeNewEventModal.addEventListener('click', ()=>{
        hideModal('newSchedModal');
    });


    btnNewSched.addEventListener('click', ()=>{
        btnNewSched.disabled = true;
        createNewSched()
    })

});

const getEvent = async function(eventId = '') {
    let arEvent = await axios({
        method: 'get',
        url: `/schedule/events/${eventId}`,
    });
    return arEvent;
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

const newSchedFormValidation = function({id, patient_id, patient_name, patient_schedules_start_sched}){
    let response = {
        id,
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

    let retSched = null;

    var arSched = newSchedFormValidation({
        'id' : elmntSchedId.value ? elmntSchedId.value : null,
        'patient_id' : elmntPatient.getAttribute('data-id'),
        'patient_name' : elmntPatient.value,
        'patient_schedules_start_sched' : elmntEventDate.value,
    });

    if (!arSched) {
        return;
    }

    if (arSched.id) {
        retSched = await axios({
            method: 'put',
            url: '/schedule/events/edit',
            data: arSched
        });
    } else {
        retSched = await axios({
            method: 'post',
            url: '/schedule/events/store',
            data: arSched
        });
    }

    if (retSched.status != 200) {
        document.getElementById('modalError').classList.remove('hidden');
    }

    calendar.refetchEvents()

    btnNewSched.disabled = false;
    hideModal('newSchedModal');
    document.getElementById('textModalSuccess').innerHTML = retSched.data;
    document.getElementById('modalSuccess').classList.remove('hidden');
}
