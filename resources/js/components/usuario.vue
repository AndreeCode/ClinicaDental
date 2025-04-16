<template>
    <div class="">
        <h1>Bienvenido a usuarios</h1>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            N
                        </th>
                        <th scope="col" class="px-6 py-3">
                            nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            apellido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                 
                    
                    <tr v-for='(user,hola) in users'
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{hola+1}}
                        </th>
                        <td class="px-6 py-4">
                            {{user.name}}
                        </td>
                        <td class="px-6 py-4">
                            {{user.lastname}}
                        </td>
                        <td class="px-6 py-4">
                            {{user.rol}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#">editar</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#">eliminar</a>
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
                users:[],
                hola: 0,
            };
        },
        mounted(){
            try{
                axios.get('/api/user/show').then(resp=>{
                    this.users=resp.data;
                }
                );
            }catch(e){
                console.log(e)
            }
        }
    }
    

    
</script>
