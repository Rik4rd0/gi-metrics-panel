
function switchView(button, view) {
    const buttons = document.querySelectorAll('.view-selector button');
    buttons.forEach(btn => {
        btn.classList.remove('bg-red-500', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });

    button.classList.add('bg-red-500', 'text-white');
    button.classList.remove('bg-gray-200', 'text-gray-700');


    console.log(`Vista cambiada a: ${view}`);
}


function selectOption(button) {
    const buttons = document.querySelectorAll('.options-selector button');
    buttons.forEach(btn => {
        btn.classList.remove('bg-gray-700', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });

    button.classList.add('bg-gray-700', 'text-white');
    button.classList.remove('bg-gray-200', 'text-gray-700');

    const selectedOption = button.textContent;
    document.dispatchEvent(new CustomEvent('optionSelected', {
        detail: { option: selectedOption }
    }));
}

document.addEventListener('DOMContentLoaded', function() {
    const defaultViewButton = document.querySelector('.view-selector button');
    if (defaultViewButton) {
        switchView(defaultViewButton, 'calendar');
    }

    const defaultOptionButton = document.querySelector('.options-selector button');
    if (defaultOptionButton) {
        selectOption(defaultOptionButton);
    }
});
