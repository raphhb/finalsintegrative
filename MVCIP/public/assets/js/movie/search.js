$(() => {
    $("#searchForm").on("submit", (e) => {
        e.preventDefault();
        let formData = new FormData($("#searchForm")[0]);
        try {
            $.ajax({
                url: "Movie/search",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response);
                    alert(response.result);
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    console.error("Something went wrong: " + errorThrown);
                }
            })
        } catch (e) {
            console.error("Something went wrong: " + e);
        }
    })
})
