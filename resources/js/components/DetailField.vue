<template>
    <PanelItem :index="index" :field="field" />
  </template>
  
  <script>
  export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
    mounted() {

    //     if(data.reopenModal){
    //     this.selectedActionKey = data.reopenModal;
    //     // this.initializeActionFields();
    //     setTimeout(() => {
    //       this.determineActionStrategy();
    //       // code to be executed after 1 second
    //     }, 500);
    //     // 
        
       
    //   }
    },
  }
  </script>