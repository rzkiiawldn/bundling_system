const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData) {
	Swal.fire(
		'Congratulation!',
		'User account has been created!',
		'success'
	)
}
// 2
const alertData = $('.flash-wrongusername').data('flashdata');
console.log(alertData);

if (alertData) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong Username!'
	})
}
// 3
const wrongData = $('.flash-wrongpassword').data('flashdata');
console.log(wrongData);

if (wrongData) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong Password!'
	})
}
// 4
const wrongForgot = $('.flash-forgot').data('flashdata');
console.log(wrongForgot);

if (wrongForgot) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Email is not registered!'
	})
}
// 5
const checkEmail = $('.flash-checkemail').data('flashdata');
console.log(checkEmail);

if (checkEmail) {
	Swal.fire(
		'Success!',
		'Please check your email!',
		'success'
	)
}
// 6
const successChange = $('.flash-change').data('flashdata');
console.log(successChange);

if (successChange) {
	Swal.fire(
		'Success!',
		'Password has been change, Please login!',
		'success'
	)
}
// 7
const logoutData = $('.flash-logout').data('flashdata');
console.log(logoutData);

if (logoutData) {
	Swal.fire(
		'Success!',
		'You have been logged out!',
		'success'
	)
}
// 8
const locationCreate = $('.flash-dataloc').data('flashdata');
console.log(locationCreate);

if (locationCreate) {
	Swal.fire(
		'Success!',
		'Location has been created!',
		'success'
	)
}
// 9
const locationUpdate = $('.flash-updateloc').data('flashdata');
console.log(locationUpdate);

if (locationUpdate) {
	Swal.fire(
		'Success!',
		'Location has been updated!',
		'success'
	)
}
// 10
const wrongPass = $('.flash-changepass').data('flashdata');
console.log(wrongPass);

if (wrongPass) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Wrong Current Password!'
	})
}
// 11
const wrongNewpass = $('.flash-wrongnewpass').data('flashdata');
console.log(wrongNewpass);

if (wrongNewpass) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'New password cannot be the same as current password!'
	})
}
// 12
const changePass = $('.flash-successpass').data('flashdata');
console.log(changePass);

if (changePass) {
	Swal.fire(
		'Success!',
		'Your password hass been changed!',
		'success'
	)
}
// 13
$('.delete-user').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	})
});
// 14
const userEdit = $('.flash-edituser').data('flashdata');
console.log(userEdit);

if (userEdit) {
	Swal.fire(
		'Success!',
		'Your profile has been changed!',
		'success'
	)
}
// 15
const createCounter = $('.flash-datacounter').data('flashdata');
console.log(createCounter);

if (createCounter) {
	Swal.fire(
		'Success!',
		'Counter number has been created!',
		'success'
	)
}
// 16
const updateCounter = $('.flash-counterupdate').data('flashdata');
console.log(updateCounter);

if (updateCounter) {
	Swal.fire(
		'Success!',
		'Counter number has been changed!',
		'success'
	)
}
// 17
const addStatus = $('.flash-createstatus').data('flashdata');
console.log(addStatus);

if (addStatus) {
	Swal.fire(
		'Success!',
		'Status has been created!',
		'success'
	)
}
// 18
const addSupplier = $('.flash-createsupplier').data('flashdata');
console.log(addSupplier);

if (addSupplier) {
	Swal.fire(
		'Success!',
		'Supplier has been created!',
		'success'
	)
}
// 19
const addCoa = $('.flash-createcoa').data('flashdata');
console.log(addCoa);

if (addCoa) {
	Swal.fire(
		'Success!',
		'Chart of Account has been created!',
		'success'
	)
}
// 20
const selectDept = $('.flash-dept').data('flashdata');
console.log(selectDept);

if (selectDept) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Please Select Department!'
	})
}
// 21
const selectLoc = $('.flash-selectloc').data('flashdata');
console.log(selectLoc);

if (selectLoc) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Please Select Location!'
	})
}
// 22
const optionDept = $('.flash-selectdept').data('flashdata');
console.log(optionDept);

if (optionDept) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Please Select Depertment!'
	})
}
// 23
const addPlafond = $('.flash-createplafond').data('flashdata');
console.log(addPlafond);

if (addPlafond) {
	Swal.fire(
		'Success!',
		'Plafond has been created!',
		'success'
	)
}
// 24
const noticeDeptloc = $('.flash-deptloc').data('flashdata');
console.log(noticeDeptloc);

if (noticeDeptloc) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Department is already exist in this warehouse!'
	})
}
// 25
const topupPlafond = $('.flash-topupplafond').data('flashdata');
console.log(topupPlafond);

if (topupPlafond) {
	Swal.fire(
		'Success!',
		'Top Up was successful!',
		'success'
	)
}
// 26
const withdrawalPlafond = $('.flash-withdrawalplafond').data('flashdata');
console.log(withdrawalPlafond);

if (withdrawalPlafond) {
	Swal.fire(
		'Success!',
		'Withdrawal was successful!',
		'success'
	)
}
// 28
const limitPlafond = $('.flash-limitwithdraw').data('flashdata');
console.log(limitPlafond);

if (limitPlafond) {
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'The Withdrawal is bigger in comparison with Cash on Bank!'
	})
}
// 29
const updatePlafond = $('.flash-editcob').data('flashdata');
console.log(updatePlafond);

if (updatePlafond) {
	Swal.fire(
		'Success!',
		'Plafond has been updated!',
		'success'
	)
}
