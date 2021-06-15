// Действия для фильтров

// Анимация хедера
let header = document.getElementById('navbarHeader');
let button = document.getElementById('navbarToggler');

button.addEventListener('click', () => {
    // header.classList.toggle('show');
    header.classList.toggle('show');
    // header.classList.add('collapsing');
    // header.addEventListener('animationend', () => {
    //     header.classList.toggle('collapsing');
    // })
})

// Действия на кнопки
let subscrabers_button = document.getElementById('f_subscribers');
subscrabers_button.addEventListener('click', () => {
    mySort()
})

let name_button = document.getElementById('f_name');
name_button.addEventListener('click', () => {
    myAlfSort()
})

let cap_button = document.getElementById('f_cap');
cap_button.addEventListener('click', () => {
    myCapSort()
})

// Сортировка по количеству подписчиков
function mySort(){
    let container = document.querySelector('#row-container');
    let nav = document.querySelectorAll('#row-element');

    let sortedElements = [...nav].sort((a, b) => getNumberFromNode(b) - getNumberFromNode(a));

    let html = '';

    for(let i = 0; i < sortedElements.length; ++i ) {
        html += sortedElements[i].outerHTML;
    }
    container.innerHTML = html;
}

// Сортировка по длине подписи
function myCapSort(){
    let container = document.querySelector('#row-container');
    let nav = document.querySelectorAll('#row-element');

    let sortedElements = [...nav].sort((a, b) => getCapFromNode(b) - getCapFromNode(a));

    let html = '';

    for(let i = 0; i < sortedElements.length; ++i ) {
        html += sortedElements[i].outerHTML;
    }
    container.innerHTML = html;
}

// Сортировка по имени сообщества в алфавитном порядке
function myAlfSort(){
    let container = document.querySelector('#row-container');
    let nav = document.querySelectorAll('#row-element');

    let sortedElements = getNameFromNode(nav);
    console.log(sortedElements)

    let html = '';

    for(let i = 0; i < sortedElements.length; i++ ) {
        for(let j = 0; j < sortedElements.length; j++ ) {
            if (nav[j].getElementsByClassName('card-name')[0].textContent === sortedElements[i]){
                html += nav[j].outerHTML;
            }
        }
    }
    container.innerHTML = html;
}

// Вспомогательные функции для парсинга узлов
// Получение количества подписчиков
function getNumberFromNode(node) {
    return +node.getElementsByClassName('text-muted')[0].textContent.split(':')[1];
}

// Получение отсортированного списка имен сообществ
function getNameFromNode(node) {
    console.log(node)
    let names_arr = []
    node.forEach((item) => {
        console.log(item.getElementsByClassName('card-name')[0].textContent)
        names_arr.push(item.getElementsByClassName('card-name')[0].textContent)
    })

    return names_arr.sort()
}

// Получение длины подписи публикации
function getCapFromNode(node) {
    return node.getElementsByClassName('card-text')[0].textContent.length;
}