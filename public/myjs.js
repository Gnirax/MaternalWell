const totalTabs = document.getElementsByClassName("tab").length;
let currentTab = 0;

showTab(currentTab);

function showTab(n) {
    const tabs = document.getElementsByClassName("tab");
    tabs[n].style.display = "block";

    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    prevButton.style.display = n === 0 ? "none" : "inline";
    nextButton.innerHTML = n === totalTabs - 1 ? "Submit" : "Next";

    fixStepIndicator(n);
}

document.addEventListener("DOMContentLoaded", function() {
    var marital = document.getElementById('marital');
    var husbandinfo = document.getElementById('husbandinfo');

    marital.addEventListener("change", function() {
        if (marital.value === "Married") {
            husbandinfo.style.display = 'block';
            tabs[currentTab].style.display = "block";
        } else{
            husbandinfo.style.display = "none";
            tabs[currentTab].style.display = "none";
        }
    });
});

function nextPrev(n) {
    const tabs = document.getElementsByClassName("tab");
    var marital = document.getElementById("marital").value;

    if( marital == "Single" && (currentTab == 0 || (currentTab == 2 && n == -1) ) ){
        tabs[currentTab].style.display = "none";
        currentTab = 1;
        currentTab += n;
    }else{
        tabs[currentTab].style.display = "none";
        husbandinfo.style.display = 'block';
        currentTab += n;
    }

    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    if (currentTab >= tabs.length) {
        nextButton.value = "SUBMIT";
        nextButton.type = "submit";
        prevButton.value = "Previous";
        prevButton.type = "button";
    } else {
        nextButton.value = "Next";
        prevButton.value = "Previous";
        nextButton.type = "button";
        prevButton.type = "button";
    }

    showTab(currentTab);
}

function nP(n) {
    const tabs = document.getElementsByClassName("tab");
    tabs[currentTab].style.display = "none";
    currentTab += n;

    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");

    if (currentTab >= tabs.length) {
        nextButton.value = "SUBMIT";
        nextButton.type = "submit";
        prevButton.value = "Previous";
        prevButton.type = "button";
    } else {
        nextButton.value = "Next";
        prevButton.value = "Previous";
        nextButton.type = "button";
        prevButton.type = "button";
    }

    showTab(currentTab);
}
// function nextPrev(n) {
//     // Ensure the currentTab remains within valid bounds
//     currentTab = Math.min(Math.max(currentTab + n, 0), totalTabs - 1);

//     const tabs = document.getElementsByClassName("tab");
//     const maritalStatus = document.getElementById("marital").value;

//     if (maritalStatus === "Single" && currentTab === 1) {
//         currentTab = 2;
//     }

//     tabs[currentTab].style.display = "none";

//     // Update the "Previous" and "Next" buttons
//     const prevButton = document.getElementById("prev");
//     const nextButton = document.getElementById("next");

//     if (currentTab === 0) {
//         prevButton.style.display = "none";
//     } else {
//         prevButton.style.display = "inline";
//     }

//     if (currentTab === totalTabs - 1) {
//         nextButton.innerHTML = "Submit";
//     } else {
//         nextButton.innerHTML = "Next";
//     }

//     fixStepIndicator(currentTab);
// }

function fixStepIndicator(n) {
    const steps = document.getElementsByClassName("step");

    for (let i = 0; i < steps.length; i++) {
        steps[i].className = steps[i].className.replace(" active", "");
    }

    steps[n].className += " active";
}
