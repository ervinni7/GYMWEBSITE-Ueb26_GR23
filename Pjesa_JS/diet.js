/*BMI kalkulatori*/
document.getElementById("bmi-form").addEventListener("submit", function(e){
    e.preventDefault();

    let height = parseFloat(document.getElementById("height").value) / 100;
    let weight = parseFloat(document.getElementById("weight").value);
    let result = document.getElementById("bmi-result");

    if(height <= 0 || weight <= 0){
        result.textContent = "Ju lutem vendosni vlera të sakta!";
        result.style.color = "red";
        return;
    }

    let bmi = weight / (height * height);
    let status = "";

    if(bmi < 18.5) status = "Nën peshë";
    else if(bmi < 25) status = "Peshë normale";
    else if(bmi < 30) status = "Mbi peshë";
    else status = "Obezitet";

    result.textContent = `BMI juaj është: ${bmi.toFixed(1)} — ${status}`;
    result.style.color = "#111";
});


/*pjesa e dietes met dergu tek detajet*/ 
const rowToDetailsMap = {
  bulking: 'diet-bulking',
  cutting: 'diet-cutting',
  mirembajtje: 'diet-maintenance',
  vegjetarian: 'diet-veg',
  highprotein: 'diet-highprotein',
  lowcarb: 'diet-lowcarb'
};

document.addEventListener('DOMContentLoaded', () => {
  const dietRows = document.querySelectorAll('.diet-item');

  dietRows.forEach(row => {
    row.style.cursor = 'pointer';

    row.addEventListener('click', () => {
      const detailsSection = document.getElementById('diet-details');
      if (detailsSection) detailsSection.style.display = 'block';

      const key = row.dataset.target;          
      const detailsId = rowToDetailsMap[key]; 
      if (!detailsId) return;

      document.querySelectorAll('.diet-card').forEach(card => {
        card.classList.remove('active');
      });

      const card = document.getElementById(detailsId);
      if (card) {
        card.classList.add('active');
        card.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
});

/*animacioni*/
window.addEventListener("load", () => {
  document.querySelector(".tools-section")?.classList.add("animate-in");
  document.querySelector(".intro-text")?.classList.add("animate-in");

  document.querySelectorAll(".diet-item").forEach((item, i) => {
    setTimeout(() => {
      item.classList.add("animate-in");
    }, i * 120);
  });
});

/*Pjesa CIG kur prekum 'zgjidh dieten'*/ 
document.querySelectorAll('.cta-link').forEach(btn=>{
  btn.addEventListener('click', e=>{
    e.preventDefault();
    document.querySelector('#diet-list').scrollIntoView({behavior:'smooth', block:'start'});
  });
});

