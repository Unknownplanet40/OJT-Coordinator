document.addEventListener("DOMContentLoaded", function () {
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

  //for Complete
  var COMname = document.getElementById("COMname");
  var COMpword = document.getElementById("COMpword");
  var COMconpword = document.getElementById("COMconpword");
  var COMaddress = document.getElementById("COMaddress");
  var COMcity = document.getElementById("COMcity");
  var COMprovince = document.getElementById("COMprovince");
  var COMzip = document.getElementById("COMzipcode");
  var COMmail = document.getElementById("COMemail");
  var COMphone = document.getElementById("COMphone");
  var COMgender = document.getElementById("COMgender");
  var COMage = document.getElementById("COMage");

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
  } else {
    COMform.addEventListener("submit", (e) => {
      e.preventDefault();

      INCerror.innerHTML = "";

      if (
        COMname.value.trim() === "" ||
        COMpword.value.trim() === "" ||
        COMconpword.value.trim() === "" ||
        COMaddress.value.trim() === "" ||
        COMcity.value.trim() === "" ||
        COMprovince.value.trim() === "" ||
        COMzip.value.trim() === "" ||
        COMmail.value.trim() === "" ||
        COMphone.value.trim() === "" ||
        COMgender.value.trim() === ""
      ) {
        INCerror.innerHTML = "Please fill out all fields";
      } else if (COMpword.value != COMconpword.value) {
        INCerror.innerHTML = "Password does not match";
      } else if (COMpword.value.length < 8) {
        INCerror.innerHTML = "Password must be at least 8 characters";
      } else if (COMage.value < 18) {
        INCerror.innerHTML = "You must be 18 years old and above.";
      } else {
        COMform.submit();
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
  let VACerror = document.getElementById("VACerror");

  VD1.style.display = "none";
  VD2.style.display = "none";
  VD3.style.display = "none";
  VD1Label.style.display = "none";
  VD2Label.style.display = "none";
  VD3Label.style.display = "none";

  VACform.addEventListener("submit", (e) => {
    e.preventDefault();
    

    VACerror.innerHTML = "";

    if (
      vaccinetype.value.trim() === "" ||
      vaccinename.value.trim() === "" ||
      vaccinelocation.value.trim() === "" ||
      vaccineDose.value.trim() === ""
    ) {
      VACerror.innerHTML = "Please fill out all fields";
    } else {
      VACform.submit();
    }
  });

  vaccinetype.addEventListener("change", function () {
    let VNSO7 = document.getElementById("VNSO7");
    let VDSO1 = document.getElementById("VDSO1");
    if (vaccinetype.value == 2) {
      //add VNSO7 Selected attribute
      VNSO7.setAttribute("selected", "");
      VDSO1.setAttribute("selected", "");
      VD1.style.display = "block";
      VD1Label.style.display = "block";
    } else {
      VNSO7.removeAttribute("selected");
      VDSO1.removeAttribute("selected");
      VD1.style.display = "none";
      VD1Label.style.display = "none";
    }
  });

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

  // for Show vaccine form
  var editVaccine = document.getElementById("editVaccine");
  var vaccineData = document.getElementById("VACDetails");
  var VACcontainer = document.getElementById("VACcontainer");

  vaccineData.style.display = "none";

  if (VaccCompleted) {
    vaccineData.style.display = "block";
    VACcontainer.style.display = "none";

    editVaccine.addEventListener("click", function () {
      if (vaccineData.style.display == "none") {
        vaccineData.style.display = "block";
        VACcontainer.style.display = "none";
      } else {
        vaccineData.style.display = "none";
        VACcontainer.style.display = "block";
      }
    });
  } else {
    vaccineData.style.display = "none";
    VACcontainer.style.display = "block";
  }
});
