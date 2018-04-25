$(function () {
            let one = $('#college'),
                two = $('#major');
            two.attr('disabled', true);
            one.on('change', function (e) {
                let value = e.target.value;
                if (value === '通院') {
                    two.attr('disabled', false).empty();
                    createOption(0);
                } else if (value === '电光院') {
                    two.attr('disabled', false).empty();
                    createOption(1);
                } else {
                    two.attr('disabled', true).empty();
                }
            });
        
            function createOption(t) {
                const arr = [
                    ['通信工程', '电子信息工程', '广播电视工程', '信息工程'],
                    ['光电信息科学与工程', '电信工程及管理','电子科学与技术', '电磁场无线与技术', '微电子科学与工程']
                ];
                arr[parseInt(t)].map((item) => {
                    let str = '';
                    str += `<option value="${item}">${item}</option>`;
                    two.append(str);
                })
            }
        })