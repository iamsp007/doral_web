
let state = {};
// state management
function updateState(newState) {
	state = { ...state, ...newState };
	console.log(state);
}
// event handlers
$(".file-upload-1").change(function (e) {
	let files = document.getElementsByClassName("file-upload-1")[0].files;
	let filesArr = Array.from(files);
	updateState({ files: files, filesArr: filesArr });
	renderFileList();
	setTimeout(() => {
		$(".upload-files-custom").removeClass('d-none')
	}, 100);
});
$(".upload-your-files .files").on("click", ".delete", function (e) {
	let key = $(this)
		.parent()
		.attr("key");
	let curArr = state.filesArr;
	curArr.splice(key, 1);
	updateState({ filesArr: curArr });
	renderFileList();
	if (curArr?.length < 1) {
		$(".upload-files-custom").addClass('d-none')
	}
});
$("form").on("submit", function (e) {
	e.preventDefault();
	console.log(state);
	renderFileList();
});
// render functions
function renderFileList() {
	$(".upload-files-custom").removeClass('d-none')
	let fileMap = state.filesArr.map((file, index) => {
		let suffix = "bytes";
		let size = file.size;
		if (size >= 1024 && size < 1024000) {
			suffix = "KB";
			size = Math.round(size / 1024 * 100) / 100;
		} else if (size >= 1024000) {
			suffix = "MB";
			size = Math.round(size / 1024000 * 100) / 100;
		}
		return `<li key="${index}">
		<div class="selectedFileBox"><div class="filename">${file.name}</div><div class="mb">${size} ${suffix}</div>
		<i class="las la-trash la-3x delete"></i></li></div>`;
	});
	$("ul.fileSize").html(fileMap);
}