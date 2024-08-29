const container = document.querySelector(".container");
const search = document.querySelector(".search-box button");
const weatherBox = document.querySelector(".weather-box");
const weatherDetails = document.querySelector('.weather-details');
const error404 = document.querySelector('.not-found');
const cityHide = document.querySelector('.city-hide');

search.addEventListener('click', () => {
    const APIKey = '630b6c68784e921b31e7c05cd05981f0';
    const city = document.querySelector(".search-box input").value.trim();

    if (city === "") return;

    // Önceki klonları ve hata mesajlarını temizle
    clearClones();
    clearError();

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${APIKey}`)
        .then(response => response.json())
        .then(json => {
            if (json.cod === "404") {
                showError(city);
                return;
            }

            updateWeather(json, city);
            cloneWeatherDetails();
        });
});

function clearError() {
    error404.classList.remove("active");
    weatherBox.classList.remove("active");
    weatherDetails.classList.remove("active");
    container.style.height = "400px";
}

function showError(city) {
    cityHide.textContent = city;
    container.style.height = "400px";
    error404.classList.add("active");
}

function updateWeather(json, city) {
    cityHide.textContent = city;
    container.style.height = "555px";
    container.classList.add('active');
    weatherBox.classList.add("active");
    weatherDetails.classList.add("active");

    setTimeout(() => {
        container.classList.remove('active');
    }, 2500);

    const image = document.querySelector(".weather-box img");
    const temperature = document.querySelector(".weather-box .temperature");
    const description = document.querySelector('.weather-box .description');

    const humidity = document.querySelector(".weather-details .humidity span");
    const wind = document.querySelector(".weather-details .wind span");

    const weatherIcon = {
        'Clear': 'clear.png',
        'Rain': 'rain.png',
        'Snow': 'snow.png',
        'Clouds': 'cloud.png',
        'Mist': 'mist.png',
        'Haze': 'mist.png',
    };

    image.src = `images/${weatherIcon[json.weather[0].main] || 'cloud.png'}`;
    temperature.innerHTML = `${Math.round(json.main.temp)}<span>°C</span>`;
    description.innerHTML = json.weather[0].description;
    humidity.innerHTML = `${json.main.humidity}%`;
    wind.innerHTML = `${Math.round(json.wind.speed)}Km/h`;
}

function cloneWeatherDetails() {
    const infoWeather = document.querySelector('.info-weather');
    const infoHumidity = document.querySelector('.info-humidity');
    const infoWind = document.querySelector('.info-wind');

    const elCloneinfoWeather = infoWeather.cloneNode(true);
    const elCloneinfoHumidity = infoHumidity.cloneNode(true);
    const elCloneinfoWind = infoWind.cloneNode(true);

    elCloneinfoWeather.classList.add('active-clone');
    elCloneinfoHumidity.classList.add('active-clone');
    elCloneinfoWind.classList.add('active-clone');

    infoWeather.insertAdjacentElement('afterend', elCloneinfoWeather);
    infoHumidity.insertAdjacentElement('afterend', elCloneinfoHumidity);
    infoWind.insertAdjacentElement('afterend', elCloneinfoWind);

    // Eski klonları kaldır
    setTimeout(() => {
        removeOldClones();
    }, 2200);
}

function clearClones() {
    const cloneinfoWeather = document.querySelectorAll('.info-weather.active-clone');
    const cloneinfoHumidity = document.querySelectorAll('.info-humidity.active-clone');
    const cloneinfoWind = document.querySelectorAll('.info-wind.active-clone');

    cloneinfoWeather.forEach(el => el.remove());
    cloneinfoHumidity.forEach(el => el.remove());
    cloneinfoWind.forEach(el => el.remove());
}

function removeOldClones() {
    const cloneinfoWeather = document.querySelectorAll('.info-weather.active-clone');
    const cloneinfoHumidity = document.querySelectorAll('.info-humidity.active-clone');
    const cloneinfoWind = document.querySelectorAll('.info-wind.active-clone');

    if (cloneinfoWeather.length > 1) {
        cloneinfoWeather[0].remove();
        cloneinfoHumidity[0].remove();
        cloneinfoWind[0].remove();
    }
}
