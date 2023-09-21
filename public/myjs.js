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

function nextPrev(n) {
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

// Add your validation logic here

function fixStepIndicator(n) {
    const steps = document.getElementsByClassName("step");

    for (let i = 0; i < steps.length; i++) {
        steps[i].className = steps[i].className.replace(" active", "");
    }

    steps[n].className += " active";
}

document.addEventListener("DOMContentLoaded", function() {
    const marital = document.getElementById('marital');
    const husbandinfo = document.getElementById('husbandinfo');

    marital.addEventListener("change", function() {
        if (marital.value === "Married") {
            husbandinfo.style.display = 'block';
        } else{
            husbandinfo.style.display = "none";
        }
    });
});
