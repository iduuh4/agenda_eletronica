document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      
      //initialDate: '2023-01-12',
      locale: 'pt-br',
      themeSystem: 'bootstrap5',

      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
    
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      
      events: 'listar_atividade.php'
    });

    calendar.render();
  });