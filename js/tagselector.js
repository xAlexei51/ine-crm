document.addEventListener('DOMContentLoaded', function () {
    const tagInput = document.getElementById('tag-input');
    const addTagButton = document.getElementById('add-tag');
    const tagList = document.getElementById('tag-list');
    const tagForm = document.getElementById('tag-form');

    addTagButton.addEventListener('click', function () {
        const tagText = tagInput.value.trim();

        if (tagText !== '') {
            addTag(tagText);
            tagInput.value = '';
        }
    });

    function addTag(tagText) {
        const tagElement = document.createElement('div');
        tagElement.classList.add('tag');
        tagElement.textContent = tagText;
        tagElement.addEventListener('click', function () {
            tagElement.remove();
        });

        tagList.appendChild(tagElement);
    }

    tagForm.addEventListener('submit', function (event) {
        // Antes de enviar el formulario, actualiza un campo oculto con los tags
        document.getElementById('tags-hidden').value = JSON.stringify(getTags());
    });

    function getTags() {
        const tags = [];
        const tagElements = document.querySelectorAll('.tag');
        tagElements.forEach(function (element) {
            tags.push(element.textContent);
        });
        return tags;
    }
});