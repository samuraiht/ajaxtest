function object2query(obj) {
	let q = '';
	for (const prop in obj) {
		if (q.length > 0) q += '&';
		q += prop + '=' + obj[prop];
	}
	return q;
}

async function fetchJSON(requestURL, getQuery = {}, postQuery = {}) {
	const useGet = Object.keys(getQuery).length, usePost = Object.keys(postQuery).length;

	// リクエストデータ
	const data = {
		method: usePost ? 'POST' : 'GET',
		headers: { 'Content-Type': usePost ? 'application/x-www-form-urlencoded' : 'text/plain' },
		mode: 'cors',
		cache: 'no-cache',
		credentials: 'same-origin',
		redirect: 'follow',
		referrerPolicy: 'no-referrer'
	};
	if (usePost) data.body = object2query(postQuery);

	const response = await fetch(requestURL + (useGet ? '?' + object2query(getQuery) : ''), data);
	return response.text();
}

async function onajaxclick() {
	const response = await fetchJSON('/posts/ajax', {}, { '_token': form._token.value, 'title': form.title.value, 'content': form.content.value });
	document.getElementById('ajaxframe').innerHTML += response;
	form.title.value = '';
	form.content.value = '';
}

const form = document.forms.ajax;
document.getElementById('ajaxbtn').addEventListener('click', onajaxclick);
