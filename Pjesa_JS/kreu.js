// Përshëndetje dinamike bazuar në kohën e ditës
function shfaqPershendetje() {
  const hero = document.querySelector('.hero');
  const tani = new Date();
  const ora = tani.getHours();
  
  let pershendetje = '';
  let emoji = '';
  
  if (ora >= 5 && ora < 12) {
    pershendetje = 'Mirëmëngjesi! Filloje ditën me energji';
    emoji = '🌅';
  } else if (ora >= 12 && ora < 18) {
    pershendetje = 'Mirëdita! Koha perfekte për stërvitje';
    emoji = '💪';
  } else if (ora >= 18 && ora < 22) {
    pershendetje = 'Mirëmbrëma! Afati perfekt për gym';
    emoji = '🔥';
  } else {
    pershendetje = 'Ç\'ke ngel? Gjumi është i rëndësishëm!';
    emoji = '😴';
  }
  
  const pershendetjeDiv = document.createElement('div');
  pershendetjeDiv.style.cssText = `
    margin-top: 15px;
    font-size: 16px;
    color: #ff8800;
    font-weight: bold;
    animation: fadeIn 1.5s ease-in;
  `;
  pershendetjeDiv.textContent = `${emoji} ${pershendetje}`;
  hero.appendChild(pershendetjeDiv);
}

// Thenjet motivuese që ndryshojnë çdo 5 sekonda
function shfaqCitate() {
  const citatet = [
    '💪 "Fuqia nuk vjen nga ajo që mund të bësh, por nga tejkalimi i asaj që mendon se nuk mund."',
    '🏋️ "Suksesi fillon me vendimin për të provuar."',
    '🔥 "Vetëm një stërvitje të keqe larg nga një ditë e mirë."',
    '⚡ "Dhimbja që ndjen sot do të jetë forca që do të kesh nesër."',
    '🎯 "Qëllimet e tua nuk janë të lehta, por janë të arritshme."',
    '💯 "Transformimi fillon me vendimin e parë."'
  ];
  
  // Krijo elementin për citatën
  const citataDiv = document.createElement('div');
  citataDiv.style.cssText = `
    margin: 20px auto;
    padding: 15px;
    background: linear-gradient(135deg, #ff8800 0%, #ff6600 100%);
    color: white;
    border-radius: 10px;
    text-align: center;
    font-size: 15px;
    font-style: italic;
    box-shadow: 0 4px 15px rgba(255, 136, 0, 0.3);
    transition: all 0.5s ease;
  `;
  
  const container = document.querySelector('.container');
  container.insertBefore(citataDiv, container.firstChild.nextSibling);
  
  let index = 0;
  
  function ndryshoCitate() {
    citataDiv.style.opacity = '0';
    citataDiv.style.transform = 'translateY(-10px)';
    
    setTimeout(() => {
      citataDiv.textContent = citatet[index];
      citataDiv.style.opacity = '1';
      citataDiv.style.transform = 'translateY(0)';
      index = (index + 1) % citatet.length;
    }, 300);
  }
  
  ndryshoCitate();
  setInterval(ndryshoCitate, 5000); // Ndërro çdo 5 sekonda
}

// Shfaq kohën aktuale në seksionin e orarit
function shfaqKohenAktuale() {
  const infoLine = document.querySelector('.info-line');
  infoLine.style.display = 'flex';
  infoLine.style.justifyContent = 'space-between';
  infoLine.style.alignItems = 'center';
  infoLine.style.padding = '10px 15px';
  
  // Krijo div për kohën
  const kohaDiv = document.createElement('div');
  kohaDiv.style.cssText = `
    padding: 8px 15px;
    background: linear-gradient(135deg, #ff8800 0%, #ff6600 100%);
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(255, 136, 0, 0.3);
    font-size: 16px;
    color: white;
    font-weight: bold;
    margin-left: auto;
    min-width: 160px;
    text-align: center;
    transition: all 0.3s ease;
  `;
  
  // Efekt hover
  kohaDiv.addEventListener('mouseenter', () => {
    kohaDiv.style.transform = 'scale(1.05)';
    kohaDiv.style.boxShadow = '0 6px 20px rgba(255, 136, 0, 0.4)';
  });
  
  kohaDiv.addEventListener('mouseleave', () => {
    kohaDiv.style.transform = 'scale(1)';
    kohaDiv.style.boxShadow = '0 4px 15px rgba(255, 136, 0, 0.3)';
  });
  
  // Funksion për të përditësuar kohën
  function perditsoKohen() {
    const tani = new Date();
    const ore = String(tani.getHours()).padStart(2, '0');
    const minuta = String(tani.getMinutes()).padStart(2, '0');
    const sekonda = String(tani.getSeconds()).padStart(2, '0');
    kohaDiv.textContent = `🕒 ${ore}:${minuta}:${sekonda}`;
  }
  
  // Përditëso kohën çdo sekondë
  perditsoKohen();
  setInterval(perditsoKohen, 1000);
  
  infoLine.appendChild(kohaDiv);
}

// Ekzekuto të gjitha funksionet kur faqja ngarkohet
window.addEventListener('DOMContentLoaded', function() {
  shfaqPershendetje();
  shfaqCitate();
  shfaqKohenAktuale();
});
