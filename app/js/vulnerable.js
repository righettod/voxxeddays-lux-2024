const REVIEW_TEMPLATE = `
<div class="d-flex">
    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
    <div class="">
        <p class="mb-2" style="font-size: 14px;">@DATE@</p>
        <div class="d-flex justify-content-between">
            <h5>@USERNAME@</h5>
        </div>
        <p>@USERCOMMENT@</p>
    </div>
</div>`

function sendUserReview() {
    const userName = document.getElementById("userName").value;
    const userEmail = document.getElementById("userEmail").value;
    const userComment = document.getElementById("userComment").value;
    const formData = new FormData()
    formData.append("userName", userName);
    formData.append("userEmail", userEmail);
    formData.append("userComment", userComment);
    fetch("api.php", {
        method: "POST",
        body: formData
    }).then(response => response.json()).then(jsonData => {
        if (jsonData.status.toLowerCase() === "review stored.") {
            document.getElementById("userName").value = "";
            document.getElementById("userEmail").value = "";
            document.getElementById("userComment").value = "";
            renderUserReview();
        }
    });
}

function renderUserReview() {
    fetch("api.php", { method: "GET" }).then(response => response.json()).then(jsonData => {
        const reviewDiv = document.getElementById("nav-mission");
        if (jsonData.length > 0) {
            reviewDiv.innerHTML = "";
            jsonData.forEach((review) => {
                let reviewContent = REVIEW_TEMPLATE.replace("@USERCOMMENT@", review.userComment);
                reviewContent = reviewContent.replace("@USERNAME@", review.userName);
                reviewContent = reviewContent.replace("@DATE@", "May 05, 2024");
                reviewDiv.innerHTML += reviewContent.trim();
            });
        }
    })
}

window.onload = function () {
    console.info("App loading...");
    //See https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src-attr#violation_case
    //Initial one
    document.getElementById("userPostReview").setAttribute("onclick", "sendUserReview()");
    //Fixed one
    //document.getElementById("userPostReview").addEventListener("click", function (event) { sendUserReview() });
    renderUserReview();
    console.info("App loaded.");
}
