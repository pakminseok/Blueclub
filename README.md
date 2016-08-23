# Blueclub
SOFTWARE HYUNDAI THE FIRST HACKATHON.

개발환경
Windows10
Python 2.7
Apache 2.2.14
PHP 5.2.12 
MySQL 5.1.39
phpMyAdmin 3.2.3

python_IDLE
sublimetext

#데이터파일은 임의로 각 차량 당 시동 켜진 후 1분까지에 해당하는 데이터만 사용.
#사용데이터 : 그룹키값, 시동일시, 시퀀스번호, 속도, 광역시/도, 시/군/구, 도로 종류, 모델 연식, 차종코드
#추가데이터 : 위도, 경도, 충격값(임의로 설정)


#프로그램 설명
#프로그램을 시작하면, 실시간 차량의 속도, 위도, 경도, 충격값을 보여준다.
#충격값이 임계치를 넘을 경우(임의로 0 초과일 경우) 사고 접수를 위한 창이 각 차량의 단말기에 나타난다.
#신고 접수를 할 경우, 해당 차량의 정보가 서버 데이터베이스에 저장되고, 또한 해당 차량의 사고 여부 값이 True가 되도록 한다.
#만약 사고 접수를 안 할 경우, 다시 한 번 메시지가 나타난다. 뺑소니 용의자로 의심될 수 있다는 문구가 있다.

#만약 메시지에 'yes'라 답하면, 해당 차량은 서버 데이터베이스에 뺑소니 의심차량으로 등록된다
#서버에서 전체 사고 접수 내용을 볼 수 있다.
#사고가 났을 경우, 뺑소니 의심 차량을 구분하도록 하여, 자발적인 사고 접수를 통한 뺑소니 방지와 빠른 검거 즉, 사후 대책을 위한 아이디어를 구현하고자 했다.

