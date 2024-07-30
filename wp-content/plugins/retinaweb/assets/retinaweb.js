window.onload = function () {
  $("#access").DataTable({
    ordering: false,
    pageLength: 25,
  });
};

function upload_image(val) {
  aw_uploader = wp
    .media({
      title: "Upload File",
      library: {
        uploadedTo: wp.media.view.settings.post.id,
      },
      button: {
        text: "Use this File",
      },
      multiple: false,
    })
    .on("select", function () {
      var attachment = aw_uploader.state().get("selection").first().toJSON();
      var url = attachment.url.replace(window.location.origin, "").trim();
      $("#portal_input_" + val).val(url);
      $("#preview_portal_input_" + val).attr("src", url);
    })
    .open();
}
