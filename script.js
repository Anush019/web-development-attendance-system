document.addEventListener('DOMContentLoaded', function() {
  const monthSelect = document.getElementById('month-select');
  const yearSelect = document.getElementById('year-select');
  const calendarContainer = document.getElementById('calendar');

  monthSelect.addEventListener('change', renderCalendar);
  yearSelect.addEventListener('change', renderCalendar);

  function renderCalendar() {
    const month = monthSelect.value;
    const year = yearSelect.value;
    const daysInMonth = new Date(year, month, 0).getDate();
    const firstDayIndex = new Date(year, month - 1, 1).getDay();
    const lastDayIndex = new Date(year, month - 1, daysInMonth).getDay();
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    let calendarHTML = `<div class="day-cell">${daysOfWeek.join('</div><div class="day-cell">')}</div>`;

    for (let i = 0; i < firstDayIndex; i++) {
      calendarHTML += '<div class="day-cell"></div>';
    }

     for (let day = 1; day <= daysInMonth; day++) {
    const currentDate = new Date(year, month - 1, day);
    const dateString = currentDate.toISOString().split('T')[0];
    const cellClass = fetchDayStatus(dateString) === '1' ? 'green-cell' : '';
    calendarHTML += `<div class="day-cell ${cellClass}" data-date="${dateString}">${day}</div>`;
  }

    for (let i = lastDayIndex + 1; i < 7; i++) {
      calendarHTML += '<div class="day-cell"></div>';
    }

    calendarContainer.innerHTML = calendarHTML;
  }

  function fetchDayStatus(dateString) {
  const xhr = new XMLHttpRequest();
  const url = `fetch_day_status.php?date=${dateString}`;

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const dayStatus = xhr.responseText.trim(); // Trim any whitespace
      // Update the cell color based on the fetched day status
      const cellClass = dayStatus === '1' ? 'green-cell' : '';
      // You can further customize how the cell is updated based on day status
      const cell = document.querySelector(`.day-cell[data-date="${dateString}"]`);
      if (cell) {
        cell.classList.add(cellClass);
      }
    }
  };

  xhr.open('GET', url, true);
  xhr.send();
}


  // Initial rendering
  renderCalendar();
});
