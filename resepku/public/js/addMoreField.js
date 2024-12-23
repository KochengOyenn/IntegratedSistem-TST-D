let i = 1;
$("#more-ingredients").click(function () {
    ++i;
    $("#multipleFieldIngredients").append(
        `<div class="d-flex additional mt-2">
            <input type="text" name="add_more_ingredients[${i}][ingredients]" placeholder="3 siung bawang merah" class="form-control"/>
            <button type="button" class="btn btn-danger ms-2 remove-input-field"><i class="fa-solid fa-xmark d-md-none d-block"></i><span class="d-md-block d-none">Hapus</span></button>
        </div>`
    );
});

$("#more-cooking-steps").click(function () {
    ++i;
    $("#multipleFieldCookingSteps").append(
        `<div class="d-flex additional mt-2">
            <input type="text" name="add_more_cooking_steps[${i}][cooking_steps]" placeholder="Iris bawang menjadi potongan kecil" class="form-control"/>
            <button type="button" class="btn btn-danger ms-2 remove-input-field"><i class="fa-solid fa-xmark d-md-none d-block"></i><span class="d-md-block d-none">Hapus</span></button>
        </div>`
    );
});

$(document).on('click', '.remove-input-field', function () {
    $(this).parents('div > .d-flex.additional').remove();
});