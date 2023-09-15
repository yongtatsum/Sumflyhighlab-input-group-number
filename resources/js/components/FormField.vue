<template>
    <DefaultField
      :field="currentField"
      :errors="errors"
      :show-help-text="showHelpText"
      :full-width-content="fullWidthContent"
    >
      <template #field>
        <div class="flex flex-wrap items-stretch w-full relative">
          <div class="flex -mr-px" v-if="currentField.position === 'before'">
            <span
             class="flex items-center leading-normal rounded rounded-r-none border border-r-0 border-gray-300 dark:border-gray-700 px-3 whitespace-nowrap bg-gray-100 dark:bg-gray-800 text-gray-500 text-sm font-bold"
            >
              {{ currentField.text }}
            </span>
          </div>
  
          <input
            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 form-control form-input form-input-bordered"
            :id="currentField.uniqueKey"
            :class="{ 'rounded-l-none': currentField.position === 'before',
                    'rounded-r-none': currentField.position === 'after' }"
            :dusk="field.attribute"
            v-bind="extraAttributes"
            :disabled="currentlyIsReadonly"
            @input="handleChange"
            :value="value"
          />
          <div class="flex -mr-px" v-if="currentField.position === 'after'">
            <span
             class="flex items-center leading-normal rounded rounded-l-none border border-l-0 border-gray-300 dark:border-gray-700 px-3 whitespace-nowrap bg-gray-100 dark:bg-gray-800 text-gray-500 text-sm font-bold"
            >
              {{ currentField.text }}
            </span>
          </div>
        </div>
      </template>
    </DefaultField>
  </template>
  
  <script>
  import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'
  
  export default {
    mixins: [HandlesValidationErrors, DependentFormField],
  
    props: ['resourceName', 'resourceId', 'field'],
  
    computed: {
      defaultAttributes() {
        return {
          type: 'number',
          min: this.currentField.min,
          max: this.currentField.max,
          step: this.currentField.step,
          pattern: this.currentField.pattern,
          placeholder: this.currentField.placeholder || this.field.name,
          class: this.errorClasses,
          position:this.currentField.position,
          text:this.currentField.text
        }
      },
      extraAttributes() {
        const attrs = this.currentField.extraAttributes
  
        return {
          // Leave the default attributes even though we can now specify
          // whatever attributes we like because the old number field still
          // uses the old field attributes
          ...this.defaultAttributes,
          ...attrs,
        }
      },
    },
  }
  </script>
  