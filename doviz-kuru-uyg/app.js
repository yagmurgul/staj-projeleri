const amountInput = document.querySelector("#amount");
const firstOption = document.querySelector("#firstCurrencyOption");
const secondOption = document.querySelector("#secondCurrencyOption");
const resultInput = document.querySelector("#result"); 
const debtRecived = document.querySelector("#debt");
const paymentPeriot = document.querySelector("#monthOption");
const highAmount = document.querySelector("#robbery");
//yukarda elementlerimizi sectik.
const currency = new Currency(); //kullanabilmek icin nesne türettik
let exchangeResult = 0; // Global değişken

runEventListeners();

function runEventListeners(){
    amountInput.addEventListener("input",exchange); // bir sayı girilirse exchange metodunu tetikle
    paymentPeriot.addEventListener("input", interestProcesscing); // Ödeme süresi değişirse interestProcesscing metodunu tetikle
    debtRecived.addEventListener("input", interestProcesscing);
}

function exchange(){
  const amount = Number(amountInput.value.trim());
  const firstOptionValue = firstOption.options[firstOption.selectedIndex].textContent;
  const secondOptionValue = secondOption.options[secondOption.selectedIndex].textContent;

  currency.exchange(amount,firstOptionValue,secondOptionValue)
  .then((result) => {
    exchangeResult = result; // Sonucu global değişkene atama
    resultInput.value = result.toFixed(3);
    debtRecived.value = result.toFixed(3); // Alınan borca sonucu atama
    interestProcesscing(); // Faiz hesaplamasını tetikle
  });
}

function interestProcesscing(){
    const money = Number(debtRecived.value); // Alınan borçtan sonucu al
    const paymentPeriotValue = Number(paymentPeriot.options[paymentPeriot.selectedIndex].textContent.split(" ")[0]); // Seçilen ay
    const interestRate = 0.4; // Faiz oranı
    const totalDebt = money * (1 + (interestRate * paymentPeriotValue)); // Faiz oranını ayda %0.1 olarak uygulama
    highAmount.value = totalDebt.toFixed(3); // Yeni borcu yazdırma
}
