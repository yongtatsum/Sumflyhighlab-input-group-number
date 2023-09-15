import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'


Nova.booting((app, store) => {
  app.component('index-text-combine-number', IndexField)
  app.component('detail-text-combine-number',DetailField)
  app.component('form-text-combine-number', FormField)
})
