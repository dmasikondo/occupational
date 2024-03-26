@props(['checked'=>false])
<input {{$checked? 'checked': ''}}  type="checkbox" {{ $attributes->merge(['class' =>"w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"])}}>
