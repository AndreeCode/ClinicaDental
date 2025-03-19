<template>
  <div class="">
    <FullCalendar :options="calendarOptions" />
  </div>
</template>
<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        slotMinTime:'08:00:00',
        slotMaxTime:'20:00:00',
        contentHeight: 'auto',
        locale: 'es',
        timeZone: 'America/Lima',
        headerToolbar: {
          left: 'dayGridMonth,timeGridWeek,timeGridDay',
          center: 'title',
        },
        events:'http://localhost/api/event/show',

      }
    }
  }
}
</script>