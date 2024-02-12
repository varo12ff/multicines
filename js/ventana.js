function showPopup(title) {
    var popup = document.getElementById('popup');
    var popupTitle = document.getElementById('popupTitle');

    popupTitle.innerHTML = title;
    popup.style.display = 'block';
}

function hidePopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
}

