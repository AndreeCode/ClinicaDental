<template>
    <div class="">
        <h1>Bienvenido al historial</h1>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            N
                        </th>
                        <th scope="col" class="px-6 py-3">
                            titulo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            empeza
                        </th>
                        <th scope="col" class="px-6 py-3">
                            termina
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(cita,count) in citas"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ count+1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ cita.title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ cita.description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ cita.start}}
                        </td>
                        <td class="px-6 py-4">
                            {{ cita.end }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
<script>
export default{
    data(){
        return {
            citas:[],
            count:0,
        };
    },
    mounted(){
        axios.get('/api/event/show').then(resp=>{
            this.citas=resp.data;
            
        });
        
    }
}
</script>