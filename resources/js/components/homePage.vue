<template>
  <div>
    <!-- Modal para agregar evento -->
    <div v-if="showAddEventModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
      @click="showAddEventModal = false">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96" @click.stop>
        <h3 class="text-lg font-semibold mb-4">Agregar Evento</h3>
        <input v-model="newEvent.title" type="text" placeholder="Título del evento"
          class="w-full border rounded p-2 mb-4">
        <input v-model="newEvent.description" type="text" placeholder="Descripción"
          class="w-full border rounded p-2 mb-4">
        <input v-model="newEvent.start" type="datetime-local" class="w-full border rounded p-2 mb-4">
        <input v-model="newEvent.end" type="datetime-local" class="w-full border rounded p-2 mb-4">

        <div class="flex justify-end space-x-2">
          <button @click="addEvent" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
          <button @click="showAddEventModal = false"
            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
      </div>
    </div>

    <!-- Modal para detalles del evento -->
    <div v-if="showEventDetailModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
      @click="showEventDetailModal = false">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96" @click.stop>
        <h3 class="text-lg font-semibold mb-4">Detalles del Evento</h3>
        <input v-model="selectedEvent.title" type="text" class="w-full border rounded p-2 mb-4">
        <input v-model="selectedEvent.description" type="text" class="w-full border rounded p-2 mb-4">
        <input v-model="selectedEvent.start" type="datetime-local" class="w-full border rounded p-2 mb-4">
        <input v-model="selectedEvent.end" type="datetime-local" class="w-full border rounded p-2 mb-4">

        <div class="flex justify-end space-x-2">
          <button @click="updateEvent"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
          <button @click="deleteEvent"
            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Eliminar</button>
          <button @click="showEventDetailModal = false"
            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
      </div>
    </div>

    <FullCalendar ref="calendarRef" :options="calendarOptions" />
  </div>
</template>

<script>
  import axios from 'axios';
  import FullCalendar from '@fullcalendar/vue3';
  import dayGridPlugin from '@fullcalendar/daygrid';
  import timeGridPlugin from '@fullcalendar/timegrid';
  import interactionPlugin from '@fullcalendar/interaction';

  export default {
    components: {
      FullCalendar
    },
    data() {
      return {
        calendarOptions: {
          plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
          initialView: 'timeGridWeek',
          slotMinTime: '08:00:00',
          slotMaxTime: '20:00:00',
          contentHeight: 'auto',
          locale: 'es',
          timeZone: 'America/Lima',
          headerToolbar: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title'
          },
          events: 'http://localhost/api/event/show',
          dateClick: this.handleDateClick,
          eventClick: this.handleEventClick
        },
        showAddEventModal: false,
        showEventDetailModal: false,
        newEvent: {
          id: '',
          title: '',
          description: '',
          start: '',
          end: '',
          user_id: ''
        },
        selectedEvent: {}
      };
    },
    methods: {
      handleDateClick(info) {
        this.newEvent.start = info.dateStr;
        let fd = new Date(info.dateStr);
        fd.setHours(fd.getHours() - 4);
        this.newEvent.end = fd.toISOString().slice(0, 19);
        this.showAddEventModal = true;
      },
      handleEventClick(info) {
        
        this.selectedEvent = {
          id:info.event.id,
          title: info.event.title,
          description: info.event.extendedProps?.description || '',
          start: info.event.start?.toISOString().slice(0, 19) || '',
          end: info.event.end ? info.event.end.toISOString().slice(0, 19) : ''
        };
        this.showEventDetailModal = true;
      },
      async addEvent() {
        if (!this.newEvent.start || !this.newEvent.end) {
          alert("Las fechas de inicio y fin son obligatorias.");
          return;
        }

        try {
          const response = await axios.post('/api/event/create', this.newEvent);


          const calendarApi = this.$refs.calendarRef.getApi();
          ;
          calendarApi.addEvent({
            id: response.data.id,
            title: this.newEvent.title || "Sin título",
            start: this.newEvent.start,
            end: this.newEvent.end,

            description: this.newEvent.description || "Sin descripción",
            user_id: this.newEvent.user_id
          });

          this.showAddEventModal = false;
          this.newEvent = { title: '', description: '', start: '', end: '', user_id: this.newEvent.user_id };
        } catch (error) {
          console.log(error);
          alert("Error al registrar el evento.");
        }
      },
      async updateEvent() {
        
        console.log('update');
      },
      async deleteEvent() {
        
        if (!this.selectedEvent.id) {
          alert("No se puede eliminar un evento sin ID.");
          return;
        }

        if (!confirm("¿Estás seguro de que deseas eliminar este evento?")) {
          return;
        }
        try{
          
          const response=await axios.delete(`/api/event/${this.selectedEvent.id}`);
          const calendarApi=this.$refs.calendarRef.getApi();
          let event=calendarApi.getEventById(this.selectedEvent.id);
          if(event){
            event.remove();
          }
          this.showEventDetailModal = false;
        }catch(error){
          alert('Error al eliminar el evento');
          console.log(error);
        }
      }
    }
  };
</script>
