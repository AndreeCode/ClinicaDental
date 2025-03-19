import { defineStore } from "pinia";

export const useCitaStore=defineStore('cita',{
    state:()=>({
        name:'',
        i:''
    }),
    actions:{
        setCita(name,i){
            this.name=name;
            this.i=i;
        }
    }
});