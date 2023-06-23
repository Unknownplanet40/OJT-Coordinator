const INCform = document.getElementById("INCform");
const COMform = document.getElementById("COMform");
const VACform = document.getElementById("VACform");
const btnComplete = document.getElementById("Complete");
const btnIncomplete = document.getElementById("Incomplete");
const btnvaccine = document.getElementById("vaccine");
const INCerror = document.getElementById("INCerror");

//for Incomplete
var INCaddress = document.getElementById("INCadd");
var INCcity = document.getElementById("INCcity");
var INCzip = document.getElementById("INCzip");
var INCprovince = document.getElementById("INCprov");
var INCbirth = document.getElementById("INCbirth");
var INCphone = document.getElementById("INCphone");
var INCdept = document.getElementById("INCdept");
var INCsex = document.getElementById("INCsex");
var INCyear = document.getElementById("INCyear");
var INCsec = document.getElementById("INCsec");

// if INCform is null then hide the button

if (ProfileCompleted == false) {
  INCform.addEventListener("submit", (e) => {
    e.preventDefault();

    INCerror.innerHTML = "";

    if (
      INCaddress.value.trim() === "" ||
      INCcity.value.trim() === "" ||
      INCzip.value.trim() === "" ||
      INCprovince.value.trim() === "" ||
      INCbirth.value.trim() === "" ||
      INCphone.value.trim() === "" ||
      INCdept.value.trim() === "" ||
      INCsex.value.trim() === "" ||
      INCyear.value.trim() === "" ||
      INCsec.value.trim() === ""
    ) {
      INCerror.innerHTML = "Please fill out all fields";
    } else {
      INCform.submit();
    }
  });
}

// for Vaccine
var vaccinetype = document.getElementById("vaccineType");
var vaccinename = document.getElementById("vaccineName");
var vaccinelocation = document.getElementById("vaccineLocation");
var vaccineCard = document.getElementById("vaccineCard");
var vaccineDose = document.getElementById("vaccineDose");
var VD1 = document.getElementById("VD1");
var VD2 = document.getElementById("VD2");
var VD3 = document.getElementById("VD3");
let VD1Label = document.querySelector('label[for="VD1"]');
let VD2Label = document.querySelector('label[for="VD2"]');
let VD3Label = document.querySelector('label[for="VD3"]');

VD1.style.display = "none";
VD2.style.display = "none";
VD3.style.display = "none";
VD1Label.style.display = "none";
VD2Label.style.display = "none";
VD3Label.style.display = "none";

vaccineDose.addEventListener("change", function () {
  if (vaccineDose.value == "one") {
    VD1.style.display = "block";
    VD2.style.display = "none";
    VD3.style.display = "none";

    VD1Label.style.display = "block";
    VD2Label.style.display = "none";
    VD3Label.style.display = "none";
  } else if (vaccineDose.value == "two") {
    VD1.style.display = "block";
    VD2.style.display = "block";
    VD3.style.display = "none";

    VD1Label.style.display = "block";
    VD2Label.style.display = "block";
    VD3Label.style.display = "none";
  } else if (vaccineDose.value == "booster") {
    VD1.style.display = "block";
    VD2.style.display = "block";
    VD3.style.display = "block";

    VD1Label.style.display = "block";
    VD2Label.style.display = "block";
    VD3Label.style.display = "block";
  }
});
