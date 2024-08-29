document.querySelector('.operator').addEventListener('click', () => {
    const amount = document.getElementById('amount').value;
    const firstCurrency = document.getElementById('firstCurrenyOption').value;
    const secondCurrency = document.getElementById('secondCurrenyOption').value;

    // Döviz kuru hesaplama işlemi
    const conversionRate = getConversionRate(firstCurrency, secondCurrency); // Bu fonksiyonu oluşturmanız gerekecek
    const result = amount * conversionRate;
    document.getElementById('result').value = result.toFixed(2);
});

function getConversionRate(firstCurrency, secondCurrency) {
    // Döviz kuru dönüşüm oranlarını burada belirleyin.
    // Bu örnekte, her dönüşüm oranı 1 olarak varsayılmıştır.
    // Gerçek dönüşüm oranlarını almak için bir API veya sabit bir veri kümesi kullanabilirsiniz.
    const rates = {
        USD: 1,
        EUR: 0.85,
        JPY: 110,
        // Diğer döviz kurlarını burada ekleyin
    };

    return rates[secondCurrency] / rates[firstCurrency];
}