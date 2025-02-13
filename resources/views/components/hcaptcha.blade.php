@props([
    'fieldName' => '',
    'helperText' => ''
])
<div
    x-data="{}"
    x-init="hcaptcha.render('h-captcha-{{$fieldName}}', {sitekey: 'c12c34da-54d8-4be6-8028-c314d1fadfcc', callback: (e) => @this.set('{{$fieldName}}', e)})"
    class="space-y-2">
    <div wire:ignore id="h-captcha-{{$fieldName}}"></div>

    <p class="text-sm text-gray-600">{{$helperText}}</p>
</div>
