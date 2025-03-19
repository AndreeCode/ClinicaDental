<template>
    <div class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4 text-gray-700">Actualizar Registro</h1>

        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">Título (Opcional)</label>
                <input v-model="form.title"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="title" type="text" placeholder="Título del evento">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="description">Descripción (Opcional)</label>
                <input v-model="form.description"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" type="text" placeholder="Descripción del evento">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="start">Fecha de Inicio *</label>
                <input v-model="form.start"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="start" type="datetime-local" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="end">Fecha de Fin *</label>
                <input v-model="form.end"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="end" type="datetime-local" required>
            </div>

            <div class="flex justify-end">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200"
                    type="submit">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { useCitaStore } from '@/stores/cita';
    import { ref } from 'vue';

    const citaStore = useCitaStore();

    // Variables reactivas para almacenar los valores del formulario
    const form = ref({
        title: '',
        description: '',
        start: '',
        end: '',
        user_id: citaStore.i
    });

    // Método para manejar el envío del formulario
    const submitForm = async () => {
        if (!form.value.start || !form.value.end) {
            alert("Las fechas de inicio y fin son obligatorias.");
            return;
        }
        const eventData={
            start: form.value.start,
            end: form.value.end,
            user_id: form.value.user_id,
        };
        console.log(form.value.start);
        if (form.value.title) eventData.title = form.value.title;
        if (form.value.description) eventData.description = form.value.description;
        try {
            const response = await axios.post('/api/event/create', eventData);
            console.log("Evento creado:", response.data);
            alert("Evento registrado con éxito");
        } catch (error) {
            console.error("Error al guardar evento", error);
            alert("Error al registrar el evento.");
        }
    };
</script>
