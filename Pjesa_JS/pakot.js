let count = 1;

document.querySelector(".plus").onclick = function () {
  count++;
  document.querySelector(".number").textContent = count;
};

document.querySelector(".minus").onclick = function () {
  if (count > 1) {
    count--;
    document.querySelector(".number").textContent = count;
  }
};
