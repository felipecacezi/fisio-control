import axios from "axios";

const returnFormat = '/json/';
const addressBaseUrl = 'https://viacep.com.br/ws/';
const elmntPatientZipCode = document.getElementById('patient_zip_code');

const elmntPatientStreet = document.getElementById('patient_street');
const elmntPatientDistrict = document.getElementById('patient_district');
const elmntPatientCity = document.getElementById('patient_city');
const elmntPatientState = document.getElementById('patient_state');
const elmntPatientCountry = document.getElementById('patient_country');

document.addEventListener("DOMContentLoaded", function(e) {
    const elmntPatientZipCodeExists = document.body.contains(elmntPatientZipCode);
    if (elmntPatientZipCodeExists) {
        elmntPatientZipCode.addEventListener('blur', ()=>{getAddress()});
    }
});

async function getAddress (){
    let zipCode = elmntPatientZipCode.value;
    let address = await axios({
        method: 'get',
        url: addressBaseUrl+zipCode+returnFormat,
    });
    elmntPatientStreet.value = address.data.logradouro;
    elmntPatientDistrict.value = address.data.bairro;
    elmntPatientCity.value = address.data.localidade;
    elmntPatientState.value = address.data.uf;
    elmntPatientCountry.value = 'Brasil';
}
