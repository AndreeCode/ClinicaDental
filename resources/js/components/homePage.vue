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
        <input v-model="newEvent.start" type="datetime-local" placeholder="Inicio de evento"
          class="w-full border rounded p-2 mb-4">
        <input v-model="newEvent.end" type="datetime-local" placeholder="Fin de evento"
          class="w-full border rounded p-2 mb-4">

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


    <FullCalendar :options="calendarOptions" />


  </div>
</template>

<script>
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
        title: '',
        start: ''
      },
      selectedEvent: {}
    };
  },
  methods: {
    handleDateClick(info) {
      this.newEvent.start = info.dateStr;

      const fd = new Date(info.dateStr);

      fd.setHours(fd.getHours() - 4); // Ajuste manual según la zona horaria si es necesario
      this.newEvent.end = fd.toISOString().slice(0, 19).replace("T", "T");

      this.showAddEventModal = true;
    },
    handleEventClick(info) {
      // Asignar los valores de inicio y fin
      
      this.selectedEvent = {
        title: info.event.title,
        description: info.event.extendedProps.description,
        start: info.event.start.toISOString().slice(0,19).replace("T","T"), // Convierte la fecha de inicio a formato ISO
        end: info.event.end ? info.event.end.toISOString().slice(0,19).replace("T","T") : null, // Convierte la fecha de fin a formato ISO, si existe
      };

      // Asignar el inicio al objeto newEvent
      this.newEvent.start = info.event.start; // Mantén como Date para manipular fechas
      this.newEvent.end = info.event.end ? info.event.end : null; // Asignar fin solo si existe

      // Mostrar el modal con los detalles del evento
      this.showEventDetailModal = true;
    },
    async addEvent() {
      // Validar si las fechas de inicio y fin están definidas
      if (!this.newEvent.start || !this.newEvent.end) {
        alert("Las fechas de inicio y fin son obligatorias.");
        return;
      }

      // Crear el objeto con los datos del evento
      const eventData = {
        start: this.newEvent.start,
        end: this.newEvent.end,
        user_id: this.newEvent.user_id
      };

      // Si hay un título, agregarlo al objeto
      if (this.newEvent.title) eventData.title = this.newEvent.title;

      // Si hay una descripción, agregarla al objeto
      if (this.newEvent.description) eventData.description = this.newEvent.description;

      // Mostrar los datos en consola para verificar


      try {
        // Hacer la petición POST con Axios
        const response = await axios.post('/api/event/create', eventData);



        // Cerrar el modal y limpiar el formulario
        this.showAddEventModal = false;
        this.newEvent = { title: '', description: '', start: '', end: '', user_id: this.newEvent.user_id };

      } catch (error) {
        alert("Error al registrar el evento.");
      }
    },
    async updateEvent(){
      console.log('update');
    },
    async deleteEvent(){
      console.log('delete');
    }
  }
};
</script>
