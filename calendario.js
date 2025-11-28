const dayGridElement = document.getElementById('days-grid')
const prevMonthElement = document.getElementById('prev-month')
const nextMonthElement = document.getElementById('next-month')
const todayButton = document.getElementById('today-button')
const currentMonthElement = document.getElementById('current-month')

const MonthsList = [
    "Janeiro","Fevereiro", "Março", "Abril", "Maio", "Junho",
    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro",
]

let currentDate = new Date();

function LoadCalendar(){
    const year = currentDate.getFullYear()
    const month = currentDate.getMonth()

    const firstDay = new Date(year, month, 1)
    const lastDay = new Date(year, month + 1, 0)
    const prevLastDay = new Date(year, month, 0)

    const daysOfMonth = lastDay.getDate()
    const dayOfWeek = firstDay.getDay()
    const prevMonthLastDay = prevLastDay.getDate()

    dayGridElement.innerHTML = ""
    currentMonthElement.textContent = `${MonthsList[month]} ${year}`

    
    for (let i = dayOfWeek; i > 0; i--) {
        const num = prevMonthLastDay - i + 1
        const btn = document.createElement("button")
        btn.classList.add("date-button-previous")
        btn.textContent = num

        btn.onclick = () => abrirModal(num, month === 0 ? 12 : month, year)

        dayGridElement.appendChild(btn)
    }

   
    for (let i = 1; i <= daysOfMonth; i++) {
        const btn = document.createElement("button")
        btn.classList.add('date-button')
        btn.textContent = i

        btn.onclick = () => abrirModal(i, month + 1, year)

        if (
            i === new Date().getDate() &&
            month === new Date().getMonth() &&
            year === new Date().getFullYear()
        ){
            btn.classList.add("today")
        }

        dayGridElement.appendChild(btn)
    }
}

prevMonthElement.onclick = () => {
    currentDate.setMonth(currentDate.getMonth() - 1)
    LoadCalendar()
}

nextMonthElement.onclick = () => {
    currentDate.setMonth(currentDate.getMonth() + 1)
    LoadCalendar()
}

todayButton.onclick = () => {
    currentDate = new Date();
    LoadCalendar();
}

window.addEventListener("DOMContentLoaded", LoadCalendar)



