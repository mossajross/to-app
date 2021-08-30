//
// //const container = document.querySelector(".js-vote-arrows");
// const links = document.querySelectorAll(".vote");
//
//
// for(let link of links){
//
//
//     link.addEventListener("click" , (e) => {
//         e.preventDefault();
//         const element = e.target;
//         fetch('./comments/10/vote/'+element.dataset.direction)
//             .then(
//                 function(response) {
//                     if (response.status !== 200) {
//                         console.log('Looks like there was a problem. Status Code: ' +
//                             response.status);
//                         return;
//                     }
//
//                     // Examine the text in the response
//                     response.json().then(function(data) {
//                         const x = document.querySelector(".vote-total");
//                         x.innerHTML = data.votes;
//                      });
//                 }
//             )
//             .catch(function(err) {
//                 console.log('Fetch Error :-S', err);
//             });
//
//
//     })
// }

var $container = $(".vote-arrows");
$container.find("a").on("click", function (e) {
  e.preventDefault();
  var $link = $(e.currentTarget);
  $.ajax({
    url: "/comments/10/vote/" + $link.data("direction"),
    method: "POST",
  }).then(function (response) {
    $container.find(".vote-total").text(response.votes);
  });
});
