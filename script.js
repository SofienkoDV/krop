document.addEventListener("DOMContentLoaded", () => {
  const steps = document.querySelectorAll(".survey-step");
  let currentStep = 0;

  const showStep = (step) => {
    steps.forEach((s) => s.classList.remove("active"));
    steps[step].classList.add("active");
  };

  document.querySelectorAll(".next-step").forEach((button) => {
    button.addEventListener("click", () => {
      currentStep++;
      showStep(currentStep);
    });
  });

  document.getElementById("surveyForm").addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    fetch("submit_survey.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        alert(data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });

  document.getElementsByName("roomSize")[0].addEventListener("input", (e) => {
    document.getElementById("roomSizeDisplay").textContent = e.target.value;
  });

  showStep(currentStep);
});
