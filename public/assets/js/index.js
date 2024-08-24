console.log("Javascript Loaded");

$(function () {
    console.log("JQuery Loaded");

    function search(url, input) {
        if (!input || !url) {
            return;
        }

        $(input).on("keyup", function () {
            const value = $(this).val();

            if (value.length > 0) {
                $.ajax({
                    url: url,
                    data: {
                        column: $(this).attr("id"),
                        search: value,
                    },
                    type: "GET",
                    success: function (data) {
                        if (!data) {
                            return;
                        }

                        try {
                            console.log(data);
                            $(".autocomplete-items").show();
                            $(".autocomplete-items").html("");
                            data.forEach((item) => {
                                if (!item) {
                                    return;
                                }

                                $(input)
                                    .siblings(".autocomplete-items")
                                    .append(
                                        `<div class="autocomplete-item cursor">${item}</div>`
                                    );
                            });

                            $(input)
                                .siblings(".autocomplete-items")
                                .on("click", ".autocomplete-item", function () {
                                    $(input).val($(this).text());
                                    $(".autocomplete-items").hide();
                                    $(".autocomplete-items").html("");
                                });
                        } catch (error) {
                            console.error(error);
                        }
                    },
                    error: function (error) {
                        console.error(error);
                    },
                });
            } else {
                $(".autocomplete-items").hide();
                $(".autocomplete-items").html("");
            }
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
