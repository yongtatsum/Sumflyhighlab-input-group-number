Nova.booting((Vue, router, store) => {
  Vue.component('index-text-combine-number', require('./components/IndexField'))
  Vue.component('detail-text-combine-number', require('./components/DetailField'))
  Vue.component('form-text-combine-number', require('./components/FormField'))
})
