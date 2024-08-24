console.log("Javascript Loaded");

$(function () {
    console.log("JQuery Loaded");

    function search(url, input) {
        const $input = $(input);
        const $autocompleteItems = $input.siblings(".autocomplete-items");

        $input.on("focus keyup", function () {
            const value = $input.val();

            // if (!value) {
            //     $autocompleteItems.hide();
            //     return;
            // }

            $.ajax({
                url,
                data: {
                    column: $input.attr("id"),
                    search: value,
                },
                type: "GET",
                success(data) {
                    if (!data || !data.length) {
                        $autocompleteItems.hide();
                        return;
                    }

                    const html = data
                        .map(
                            (item) =>
                                `<div class="autocomplete-item cursor">${item}</div>`
                        )
                        .join("");
                    $autocompleteItems.html(html).show();

                    $autocompleteItems.on(
                        "click",
                        ".autocomplete-item",
                        function () {
                            $input.val($(this).text());
                            $autocompleteItems.hide();
                        }
                    );
                },
                error(error) {
                    console.error(error);
                },
            });
        });
    }

    // hide the autocomplete items when the user clicks outside of them
    $(document).on("click", function (event) {
        if ($(event.target).closest(".autocomplete-items").length === 0) {
            $(".autocomplete-items").hide();
            $(".autocomplete-items").html("");
        }
    });

    search("/search", "#company");
    search("/search", "#customer");
    search("/search", "#department");
});
