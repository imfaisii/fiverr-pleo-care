import './bootstrap';

const successCallback = (position) => {
    alert("You can start your shift now.")
console.log(position)
};

const errorCallback = (error) => {
    alert(error.message)
};

navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
