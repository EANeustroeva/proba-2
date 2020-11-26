# codejudge
Наше решение – это гибкая, интегрируемая веб-платформа CodeJudge(), решающая не только основную задачу автоматизации тестирования программного кода, но и обладающую рядом дополнительных функций, как видеосвязь (поднят сервер BBB, в репозитории отсутствует), решающая проблему коммуникаций, а также нейросеть, которая позволяет учителю не просто проверить работоспособность решения, но и оценить его качество и соответствие формальным требованиям задания.

:zzz: Разработано в рамках хакатона ЛЦТ, 2020  
Трек "Разработка виртуальной лаборатории по программированию "Мой код"

![Скринот](https://github.com/EANeustroeva/codejudge/blob/master/screen.png)

### Структура репозитория
В репозиторий выгружены исходники с двух разных серверов:
* Сервер IDE и компиляторы
> codejudge/root
* Web 
> webinterface/public_html/

### Структура JSON системы тестирования кода
Больше документации тут: https://judge.sanchozzz.beget.tech/#submissions
```
{
"source_code": "#include <stdio.h>\n\nint main(void) {\n char name[10];\n scanf(\"%s\", name);\n printf(\"hello, %s\n\", name);\n return 0;\n}",
"language_id": 4,
"number_of_runs": 1,
"stdin": "Judge0",
"expected_output": "hello, Judge0",
"cpu_time_limit": 1,
"cpu_extra_time": 0.5,
"wall_time_limit": 100000,
"memory_limit": 128000,
"stack_limit": 128000,
"enable_per_process_and_thread_time_limit": false,
"enable_per_process_and_thread_memory_limit": false,
"max_file_size": 1024
}
```

### Варианты возвращаемых значений

```
[{"id":1,"description":"In Queue"},{"id":2,"description":"Processing"},{"id":3,"description":"Accepted"},{"id":4,"description":"Wrong Answer"},{"id":5,"description":"Time Limit Exceeded"},{"id":6,"description":"Compilation Error"},{"id":7,"description":"Runtime Error (SIGSEGV)"},{"id":8,"description":"Runtime Error (SIGXFSZ)"},{"id":9,"description":"Runtime Error (SIGFPE)"},{"id":10,"description":"Runtime Error (SIGABRT)"},{"id":11,"description":"Runtime Error (NZEC)"},{"id":12,"description":"Runtime Error (Other)"},{"id":13,"description":"Internal Error"},{"id":14,"description":"Exec Format Error"}]
```

