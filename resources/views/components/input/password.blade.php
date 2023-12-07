<!-- It is never too late to be what you might have been. - George Eliot -->
<div class="relative w-full">
    <div class="absolute inset-y-0 right-0 flex items-center px-2">
    <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
    <label
        class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label"
        for="toggle">show</label>
    </div>
    <input
    type="password" name="password" id="password" placeholder="••••••••" value="{{ $value }}"
    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 js-password"
    required="" autocomplete="off" wire:model.live="{{ $model }}"/>
</div>

<script>
    const passwordToggle = document.querySelector('.js-password-toggle')

    passwordToggle.addEventListener('change', function() {
    const password = document.querySelector('.js-password'),
        passwordLabel = document.querySelector('.js-password-label')

    if (password.type === 'password') {
        password.type = 'text'
        passwordLabel.innerHTML = 'hide'
    } else {
        password.type = 'password'
        passwordLabel.innerHTML = 'show'
    }

    password.focus()
    })
</script>
