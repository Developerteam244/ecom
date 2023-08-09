let host = `http://${location.host}/`;

let csrf = $(`meta[name="csrf-token"]`).attr('content');

export {host,csrf};
