#include <iostream>
#include <cstring>
#include <conio.h>
#include <Windows.h>
using namespace std;
#include "graphics.h"
#pragma comment(lib, "graphics.lib")
#pragma warning(disable : 4996)
#pragma execution_character_set("utf-8")

/* Khai báo trước những hàm sẽ làm */
void screen();
void trang_bia();
void menu();
void caiDat();
/* Số đã cho */
void moPhongMau(); void MauSapXep();
/* Số tự nhập */
void moPhongTuNhap(); void MauTuNhap(); void swap(int* a, int* b);
void Trao_Doi_2_So(int xCircle01, int yCircle01, 
				   int xCircle02, int yCircle02,
				   int xText01, int yText01,
				   const char* Text01, 
				   int xText02, int yText02,
				   const char* Text02);

/* Màu chữ cửa sổ dòng lệnh */
#define BOLD_YELLOW_CMD_TEXT "\033[1m\033[33m"
#define BOLD_GREEN_CMD_TEXT "\033[1m\033[32m"

/* Biến toàn cục dành cho phần dữ liệu tự nhập */
int int_arr[8];
char const* array_element[8];

/* Phần này dành cho chỉnh tốc độ */
int speed = 10, new_speed, old_speed;


void MauSapXep()
{
	clearviewport();
	/* Thiết lập màu nền RGB cho Windows BGI */
	int mau_nen = COLOR(253, 245, 226);
	cout << mau_nen << endl;
	setbkcolor(mau_nen);
	cleardevice();
	/* Tiêu đề */
	setcolor(GREEN);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 14);
	outtextxy(350, 15, "MO PHONG GIAI THUAT SELECTION SORT");
	/* Thông báo "Đang sắp xếp" */
	int Yellow_Orange = COLOR(255, 170, 51);
	setcolor(Yellow_Orange);
	setlinestyle(SOLID_LINE, 0, 3);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 15);
	rectangle(400, 360, 820, 435);
	outtextxy(455, 380, "Dang sap xep...");
	/* Vẽ các hình*/
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(100, 150, 40);
	circle(250, 150, 40);
	circle(400, 150, 40);
	circle(550, 150, 40);
	circle(700, 150, 40);
	circle(850, 150, 40);
	circle(1000, 150, 40);
	circle(1150, 150, 40);
	/* Các phần tử */
	//6, 7, 2, 8, 1, 3, 9, 4
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 17);
	setcolor(RED);
	outtextxy(83, 125, "6");
	outtextxy(233, 125, "7");
	outtextxy(383, 125, "2");
	outtextxy(533, 125, "8");
	outtextxy(683, 125, "1");
	outtextxy(833, 125, "3");
	outtextxy(983, 125, "9");
	outtextxy(1133, 125, "4");

	delay(3000);
	/* Tiến hành sắp xếp 6 và 1*/
	//Chạy xuống
	int yCircleChayXuong, yTextChayXuong;
	for (int i = 150, j = 125; i < 300, j < 250;i += speed, j += speed)
	{
		cout << i << " " << j << endl;
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(700, i, 40);
		outtextxy(683, j, "1");
		circle(100, i, 40);
		outtextxy(83, j, "6");
		delay(100);
		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(700, i, 40);
		outtextxy(683, j, "1");
		circle(100, i, 40);
		outtextxy(83, j, "6");
		yCircleChayXuong = i;
		yTextChayXuong = j;

		cout << yCircleChayXuong << " " << yTextChayXuong << endl;
	}
	/*setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(700, yCircleChayXuong, 40);
	outtextxy(683, yTextChayXuong, "1");
	circle(100, yCircleChayXuong, 40);
	outtextxy(83, yTextChayXuong, "6");*/
	//Chạy ngang
	int xCircle1ChayNgang, xCircle2ChayNgang, xText1ChayNgang, xText2ChayNgang;
	for (int i1 = 700, i2 = 100, j1 = 683, j2 = 83; i1 >= 100, i2 <= 700, j1 >= 83, j2 <= 683;i1 -= speed, i2 += speed, j1 -= speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "1");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "6");
		delay(100);
		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "1");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "6");
		xCircle1ChayNgang = i1;
		xCircle2ChayNgang = i2;
		xText1ChayNgang = j1;
		xText2ChayNgang = j2;
		cout << xCircle1ChayNgang << " " << xCircle2ChayNgang << " " << xText1ChayNgang << " " << xText2ChayNgang << endl;
	}
	/*setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle1ChayNgang, yCircleChayXuong, 40);
	outtextxy(xText1ChayNgang, yTextChayXuong, "1");
	circle(xCircle2ChayNgang, yCircleChayXuong, 40);
	outtextxy(xText2ChayNgang, yTextChayXuong, "6");*/
	//Chạy lên
	int yCircle1ChayLen, yCircle2ChayLen, yText1ChayLen, yText2ChayLen;
	for (int i1 = yCircleChayXuong, i2 = yCircleChayXuong, j1 = yTextChayXuong, j2 = yTextChayXuong; i1 >= 150, i2 >= 150, j1 >= 125, j2 >= 125; i1 -= speed, i2 -= speed, j1 -= speed, j2 -= speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i1, 40);
		outtextxy(xText1ChayNgang, j1, "1");
		circle(xCircle2ChayNgang, i2, 40);
		outtextxy(xText2ChayNgang, j2, "6");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i1, 40);
		outtextxy(xText1ChayNgang, j1, "1");
		circle(xCircle2ChayNgang, i2, 40);
		outtextxy(xText2ChayNgang, j2, "6");

		yCircle1ChayLen = i1;
		yCircle2ChayLen = i2;
		yText1ChayLen = j1;
		yText2ChayLen = j2;

		cout << yCircle1ChayLen << " " << yCircle2ChayLen << " " << yText1ChayLen << " " << yText2ChayLen << endl;
	}
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle1ChayNgang, yCircle1ChayLen, 40);
	outtextxy(xText1ChayNgang, yText1ChayLen, "1");
	circle(xCircle2ChayNgang, yCircle2ChayLen, 40);
	outtextxy(xText2ChayNgang, yText2ChayLen, "6");

	/* Tiến hành sắp xếp 7 và 2 */
	//Chạy xuống
	for (int i = 150, j = 125;i < 300, j < 250;i += speed, j += speed)
	{
		setcolor(RED);
		circle(250, i, 40);
		outtextxy(233, j, "7");
		circle(400, i, 40);
		outtextxy(383, j, "2");
		delay(100);
		setcolor(mau_nen);
		circle(250, i, 40);
		outtextxy(233, j, "7");
		circle(400, i, 40);
		outtextxy(383, j, "2");

		yCircleChayXuong = i;
		yTextChayXuong = j;

		cout << yCircleChayXuong << " " << yTextChayXuong << endl;
	}
	/*setcolor(RED);
	circle(250, yCircleChayXuong, 40);
	outtextxy(233, yTextChayXuong, "7");
	circle(400, yCircleChayXuong, 40);
	outtextxy(383, yTextChayXuong, "2");*/
	//Chạy ngang
	for (int i1 = 400, i2 = 250, j1 = 383, j2 = 233; i1 >= 250, i2 <= 400, j1 >= 233, j2 <= 383;i1 -= speed, i2 += speed, j1 -= speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "2");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "7");
		delay(100);
		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "2");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "7");

		xCircle1ChayNgang = i1;
		xCircle2ChayNgang = i2;
		xText1ChayNgang = j1;
		xText2ChayNgang = j2;
		cout << xCircle1ChayNgang << " " << xCircle2ChayNgang << " " << xText1ChayNgang << " " << xText2ChayNgang << endl;
	}
	//Chạy lên
	for (int i1 = yCircleChayXuong, i2 = yCircleChayXuong, j1 = yTextChayXuong, j2 = yTextChayXuong; i1 >= 150, i2 >= 150, j1 >= 125, j2 >= 125; i1 -= speed, i2 -= speed, j1 -= speed, j2 -= speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i1, 40);
		outtextxy(xText1ChayNgang, j1, "2");
		circle(xCircle2ChayNgang, i2, 40);
		outtextxy(xText2ChayNgang, j2, "7");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i1, 40);
		outtextxy(xText1ChayNgang, j1, "2");
		circle(xCircle2ChayNgang, i2, 40);
		outtextxy(xText2ChayNgang, j2, "7");

		yCircle1ChayLen = i1;
		yCircle2ChayLen = i2;
		yText1ChayLen = j1;
		yText2ChayLen = j2;

		cout << yCircle1ChayLen << " " << yCircle2ChayLen << " " << yText1ChayLen << " " << yText2ChayLen << endl;
	}
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle1ChayNgang, yCircle1ChayLen, 40);
	outtextxy(xText1ChayNgang, yText1ChayLen, "2");
	circle(xCircle2ChayNgang, yCircle2ChayLen, 40);
	outtextxy(xText2ChayNgang, yText2ChayLen, "7");

	/* Tiến hành sắp xếp 7 và 3 */
	//Chạy xuống
	for (int i = 150, j = 125;i < 300, j < 250;i += speed, j += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(400, i, 40);
		outtextxy(383, j, "7");
		circle(850, i, 40);
		outtextxy(833, j, "3");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(400, i, 40);
		outtextxy(383, j, "7");
		circle(850, i, 40);
		outtextxy(833, j, "3");

		yCircleChayXuong = i;
		yTextChayXuong = j;
		cout << yCircleChayXuong << " " << yTextChayXuong << endl;
	}
	/*setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(400, yCircleChayXuong, 40);
	outtextxy(383, yTextChayXuong, "7");
	circle(850, yCircleChayXuong, 40);
	outtextxy(833, yTextChayXuong, "3");*/
	//Chạy ngang
	for (int i1 = 850, i2 = 400, j1 = 833, j2 = 383; i1 >= 400, i2 <= 850, j1 >= 383, j2 <= 833;i1 -= speed, i2 += speed, j1 -= speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "3");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "7");
		delay(100);
		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "3");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "7");

		xCircle1ChayNgang = i1;
		xCircle2ChayNgang = i2;
		xText1ChayNgang = j1;
		xText2ChayNgang = j2;
		cout << xCircle1ChayNgang << " " << xCircle2ChayNgang << " " << xText1ChayNgang << " " << xText2ChayNgang << endl;
	}
	//Chạy lên
	for (int i = yCircleChayXuong, j = yTextChayXuong; i >= 150, j >= 125;i -= speed, j -= speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i, 40);
		outtextxy(xText1ChayNgang, j, "3");
		circle(xCircle2ChayNgang, i, 40);
		outtextxy(xText2ChayNgang, j, "7");
		delay(100);
		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i, 40);
		outtextxy(xText1ChayNgang, j, "3");
		circle(xCircle2ChayNgang, i, 40);
		outtextxy(xText2ChayNgang, j, "7");

		yCircle1ChayLen = i;
		yCircle2ChayLen = i;
		yText1ChayLen = j;
		yText2ChayLen = j;

		cout << yCircle1ChayLen << " " << yCircle2ChayLen << " " << yText1ChayLen << " " << yText2ChayLen << endl;
	}
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle1ChayNgang, yCircle1ChayLen, 40);
	outtextxy(xText1ChayNgang, yText1ChayLen, "3");
	circle(xCircle2ChayNgang, yCircle2ChayLen, 40);
	outtextxy(xText2ChayNgang, yText2ChayLen, "7");

	//Tiến hành sắp xếp 8 và 4
	//Chạy xuống
	for (int i = 150, j = 125;i < 300, j < 250;i += speed, j += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(550, i, 40);
		outtextxy(533, j, "8");
		circle(1150, i, 40);
		outtextxy(1133, j, "4");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(550, i, 40);
		outtextxy(533, j, "8");
		circle(1150, i, 40);
		outtextxy(1133, j, "4");

		yCircleChayXuong = i;
		yTextChayXuong = j;
		cout << yCircleChayXuong << " " << yTextChayXuong << endl;
	}
	//Chạy ngang
	for (int i1 = 1150, i2 = 550, j1 = 1133, j2 = 533; i1 >= 550, i2 <= 1150, j1 >= 533, j2 <= 1133;i1 -= speed, i2 += speed, j1 -= speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "4");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "8");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "4");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "8");

		xCircle1ChayNgang = i1;
		xCircle2ChayNgang = i2;
		xText1ChayNgang = j1;
		xText2ChayNgang = j2;
		cout << xCircle1ChayNgang << " " << xCircle2ChayNgang << " " << xText1ChayNgang << " " << xText2ChayNgang << endl;
	}
	//Chạy lên
	for (int i = yCircleChayXuong, j = yTextChayXuong;i >= 150, j >= 125; i -= speed, j -= speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i, 40);
		outtextxy(xText1ChayNgang, j, "4");
		circle(xCircle2ChayNgang, i, 40);
		outtextxy(xText2ChayNgang, j, "8");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i, 40);
		outtextxy(xText1ChayNgang, j, "4");
		circle(xCircle2ChayNgang, i, 40);
		outtextxy(xText2ChayNgang, j, "8");

		yCircle1ChayLen = i;
		yCircle2ChayLen = i;
		yText1ChayLen = j;
		yText2ChayLen = j;

		cout << yCircle1ChayLen << " " << yCircle2ChayLen << " " << yText1ChayLen << " " << yText2ChayLen << endl;
	}
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle1ChayNgang, yCircle1ChayLen, 40);
	outtextxy(xText1ChayNgang, yText1ChayLen, "4");
	circle(xCircle2ChayNgang, yCircle2ChayLen, 40);
	outtextxy(xText2ChayNgang, yText2ChayLen, "8");

	//Tiến hành sắp xếp số 6

	//Tiến hành sắp xếp số 7

	//Tiến hành sắp xếp số 9 và 8
	//Chạy xuống
	for (int i = 150, j = 125;i < 300, j < 250;i += speed, j += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(1000, i, 40);
		outtextxy(983, j, "9");
		circle(1150, i, 40);
		outtextxy(1133, j, "8");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(1000, i, 40);
		outtextxy(983, j, "9");
		circle(1150, i, 40);
		outtextxy(1133, j, "8");

		yCircleChayXuong = i;
		yTextChayXuong = j;

		cout << yCircleChayXuong << " " << yTextChayXuong << endl;
	}
	//Chạy ngang
	for (int i1 = 1150, i2 = 1000, j1 = 1133, j2 = 983;i1 >= 1000, i2 <= 1150, j1 >= 983, j2 <= 1133;i1 -= speed, i2 += speed, j1 -= speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "8");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "9");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(i1, yCircleChayXuong, 40);
		outtextxy(j1, yTextChayXuong, "8");
		circle(i2, yCircleChayXuong, 40);
		outtextxy(j2, yTextChayXuong, "9");

		xCircle1ChayNgang = i1;
		xCircle2ChayNgang = i2;
		xText1ChayNgang = j1;
		xText2ChayNgang = j2;

		cout << xCircle1ChayNgang << " " << xCircle2ChayNgang << " " << xText1ChayNgang << " " << xText2ChayNgang << endl;
	}
	//Chạy lên
	for (int i = yCircleChayXuong, j = yTextChayXuong;i >= 150, j >= 125;i -= speed, j -= speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i, 40);
		outtextxy(xText1ChayNgang, j, "8");
		circle(xCircle2ChayNgang, i, 40);
		outtextxy(xText2ChayNgang, j, "9");

		delay(100);

		setcolor(mau_nen);
		setlinestyle(0, 0, 3);
		circle(xCircle1ChayNgang, i, 40);
		outtextxy(xText1ChayNgang, j, "8");
		circle(xCircle2ChayNgang, i, 40);
		outtextxy(xText2ChayNgang, j, "9");

		yCircle1ChayLen = i;
		yCircle2ChayLen = i;
		yText1ChayLen = j;
		yText2ChayLen = j;

		cout << yCircle1ChayLen << " " << yCircle2ChayLen << " " << yText1ChayLen << " " << yText2ChayLen << endl;
	}
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle1ChayNgang, yCircle1ChayLen, 40);
	outtextxy(xText1ChayNgang, yText1ChayLen, "8");
	circle(xCircle2ChayNgang, yCircle2ChayLen, 40);
	outtextxy(xText2ChayNgang, yText2ChayLen, "9");

	/* Thông báo "Đã sắp xếp" */
	//Xoá bằng cách vẽ lại cho trùng với màu nền
	setcolor(mau_nen);
	setlinestyle(SOLID_LINE, 0, 3);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 15);
	rectangle(400, 360, 820, 435);
	outtextxy(455, 380, "Dang sap xep...");
	//Vẽ thông báo
	setcolor(GREEN);
	setlinestyle(SOLID_LINE, 0, 3);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 15);
	rectangle(400, 360, 820, 435);
	outtextxy(480, 380, "Da sap xep !");

	/* Phím chức năng */
	int Charcoal = COLOR(54, 69, 79);
	setcolor(Charcoal);
	setlinestyle(SOLID_LINE, 0, THICK_WIDTH);
	settextstyle(BOLD_FONT, HORIZ_DIR, 4);
	rectangle(80, 480, 575, 550);
	outtextxy(200, 500, "Enter de thoat");
	rectangle(680, 480, 1195, 550);
	outtextxy(775, 500, "ESC de tro ve menu");
	int ch;
	if (!kbhit())
	{
		ch = getch();
		if (ch == 13)
			exit(true);
		if (ch == 27)
			menu();
	}
}

void swap(int* a, int* b)
{
	int temp;
	temp = *a;
	*a = *b;
	*b = temp;
}
void Trao_Doi_2_So(int xCircle01, int yCircle01, int xCircle02, int yCircle02, int xText01, int yText01, char const* Text01, int xText02, int yText02, char const* Text02)
{
	delay(2000);
	int Aquamarine = COLOR(127, 255, 212); //Màu ngọc xanh biển (Aquamarine)

	int i, j, i1, i2, j1, j2;
	//Chạy xuống
	int yCircle01ChayXuong, yText01ChayXuong, yCircle02ChayXuong, yText02ChayXuong;
	for (int i1 = yCircle01, i2 = yCircle02, j1 = yText01, j2 = yText02; i1 < 300, i2 < 300, j1 < 250, j2 < 250; i1 += speed, i2 += speed, j1 += speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle01, i1, 40);
		outtextxy(xText01, j1, Text01);
		circle(xCircle02, i2, 40);
		outtextxy(xText02, j2, Text02);
		delay(100);
		setcolor(Aquamarine);
		setlinestyle(0, 0, 3);
		circle(xCircle01, i1, 40);
		outtextxy(xText01, j1, Text01);
		circle(xCircle02, i2, 40);
		outtextxy(xText02, j2, Text02);

		yCircle01ChayXuong = i1;
		yText01ChayXuong = j1;
		yCircle02ChayXuong = i2;
		yText02ChayXuong = j2;
	}
	//Chạy ngang
	int xCircle01ChayNgang, xCircle02ChayNgang, xText01ChayNgang, xText02ChayNgang;
	for (int i1 = xCircle01, i2 = xCircle02, j1 = xText01, j2 = xText02; i1 >= xCircle02, i2 <= xCircle01, j1 >= xText02, j2 <= xText01;i1 -= speed, i2 += speed, j1 -= speed, j2 += speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(i1, yCircle01ChayXuong, 40);
		outtextxy(j1, yText01ChayXuong, Text01);
		circle(i2, yCircle02ChayXuong, 40);
		outtextxy(j2, yText02ChayXuong, Text02);
		delay(100);
		setcolor(Aquamarine);
		setlinestyle(0, 0, 3);
		circle(i1, yCircle01ChayXuong, 40);
		outtextxy(j1, yText01ChayXuong, Text01);
		circle(i2, yCircle02ChayXuong, 40);
		outtextxy(j2, yText02ChayXuong, Text02);

		xCircle01ChayNgang = i1;
		xCircle02ChayNgang = i2;
		xText01ChayNgang = j1;
		xText02ChayNgang = j2;
	}
	//Chạy lên
	int yCircle01ChayLen, yCircle02ChayLen, yText01ChayLen, yText02ChayLen;
	for (int i1 = yCircle01ChayXuong, i2 = yCircle02ChayXuong, j1 = yText01ChayXuong, j2 = yText02ChayXuong; i1 >= 150, i2 >= 150, j1 >= 129, j2 >= 129; i1 -= speed, i2 -= speed, j1 -= speed, j2 -= speed)
	{
		setcolor(RED);
		setlinestyle(0, 0, 3);
		circle(xCircle01ChayNgang, i1, 40);
		outtextxy(xText01ChayNgang, j1, Text01);
		circle(xCircle02ChayNgang, i2, 40);
		outtextxy(xText02ChayNgang, j2, Text02);

		delay(100);

		setcolor(Aquamarine);
		setlinestyle(0, 0, 3);
		circle(xCircle01ChayNgang, i1, 40);
		outtextxy(xText01ChayNgang, j1, Text01);
		circle(xCircle02ChayNgang, i2, 40);
		outtextxy(xText02ChayNgang, j2, Text02);

		yCircle01ChayLen = i1;
		yCircle02ChayLen = i2;
		yText01ChayLen = j1;
		yText02ChayLen = j2;
	}
	setcolor(RED);
	setlinestyle(0, 0, 3);
	circle(xCircle01ChayNgang, yCircle01ChayLen, 40);
	outtextxy(xText01ChayNgang, yText01ChayLen, Text01);
	circle(xCircle02ChayNgang, yCircle02ChayLen, 40);
	outtextxy(xText02ChayNgang, yText02ChayLen, Text02);
}

void MauTuNhap()
{
	/* Màu nền */
	clearviewport();
	int Aquamarine = COLOR(127, 255, 212); //Màu ngọc xanh biển (Aquamarine)
	setbkcolor(Aquamarine);
	cleardevice();
	/* Tiêu đề */
	setcolor(GREEN);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 14);
	outtextxy(350, 15, "MO PHONG GIAI THUAT SELECTION SORT");
	/* Thông báo "Đang sắp xếp" */
	int Yellow_Orange = COLOR(255, 170, 51);
	setcolor(Yellow_Orange);
	setlinestyle(SOLID_LINE, 0, 3);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 15);
	rectangle(400, 360, 820, 435);
	outtextxy(455, 380, "Dang sap xep...");

	setcolor(RED);
	setlinestyle(0, 0, 3);
	/*circle(100, 150, 40);
	circle(250, 150, 40);
	circle(400, 150, 40);
	circle(550, 150, 40);
	circle(700, 150, 40);
	circle(850, 150, 40);
	circle(1000, 150, 40);
	circle(1150, 150, 40);*/
	int xCircle[8] = { 100,250,400,550,700,850,1000,1150 },
		yCircle[8] = { 150,150,150,150,150,150,150,150 },
		radius = 40;

	for (int i = 0;i < 8;i++)
		circle(xCircle[i], yCircle[i], radius);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 16);
	setcolor(RED);
	/*outtextxy( 72, 129, array_element[0]);
	outtextxy(222, 129, array_element[1]);
	outtextxy(372, 129, array_element[2]);
	outtextxy(522, 129, array_element[3]);
	outtextxy(672, 129, array_element[4]);
	outtextxy(822, 129, array_element[5]);
	outtextxy(972, 129, array_element[6]);
	outtextxy(1122, 129, array_element[7]);*/
	int xNumber[8] = { 72,222,372,522,672,822,972,1122 },
		yNumber[8] = { 129,129,129,129,129,129,129,129 };
	for (int i = 0;i < 8;i++)
		outtextxy(xNumber[i], yNumber[i], array_element[i]);

	/* Bắt đầu sắp xếp */
	int i, j, pos_min,
		posX_Circle1, posY_Circle1, posX_Text1, posY_Text1, pos_Context1,
		posX_Circle2, posY_Circle2, posX_Text2, posY_Text2, pos_Context2;
	for (i = 0;i < size(int_arr);i++)
	{
		pos_min = i; //Ban đầu cho phần tử đầu tiên là nhỏ nhất
		/* Lấy toạ độ từng phần tử đang ở đâu trên màn hình đồ hoạ */
		posX_Circle2 = xCircle[i], posY_Circle2 = yCircle[i];
		posX_Text2 = xNumber[i]; posY_Text2 = yNumber[i];
		pos_Context2 = i;
		for (j = i + 1;j < size(int_arr);j++) //Cho j chạy từ i+1 đến n-1
		{
			if (int_arr[j] < int_arr[pos_min]) //Nếu phát hiện phần tử nhỏ nhất
			{
				/* Lấy vị trí phần tử đó trong mảng và toạ độ của nó trên màn hình đồ hoạ */
				pos_min = j; 
				cout << int_arr[i] << " " << int_arr[j] << endl;
				posX_Circle1 = xCircle[j]; posY_Circle1 = yCircle[j];
				posX_Text1 = xNumber[j]; posY_Text1 = yNumber[j];
				pos_Context1 = j;
			}
		}
		/* Nếu không tìm thấy phần tử nhỏ nhất, không tráo đổi, ngược lại tráo đổi vị trí cho nhau */
		if (pos_min != i)
		{
			/* Tráo đổi trên màn hình đồ hoạ */
			Trao_Doi_2_So(posX_Circle1, posY_Circle1,
						  posX_Circle2, posY_Circle2, 
						  posX_Text1, posY_Text1, array_element[pos_Context1],
						  posX_Text2, posY_Text2, array_element[pos_Context2]);
			/* Tráo đổi trong mảng */
			swap(&int_arr[pos_min], &int_arr[i]);
		}
	}

	/* Thông báo "Đã sắp xếp" */
	//Xoá bằng cách vẽ lại cho trùng với màu nền
	setcolor(Aquamarine);
	setlinestyle(SOLID_LINE, 0, 3);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 15);
	rectangle(400, 360, 820, 435);
	outtextxy(455, 380, "Dang sap xep...");
	//Vẽ thông báo
	setcolor(GREEN);
	setlinestyle(SOLID_LINE, 0, 3);
	settextstyle(DEFAULT_FONT, HORIZ_DIR, 15);
	rectangle(400, 360, 820, 435);
	outtextxy(480, 380, "Da sap xep !");

	/* Phím chức năng */
	int Charcoal = COLOR(54, 69, 79);
	setcolor(Charcoal);
	setlinestyle(SOLID_LINE, 0, THICK_WIDTH);
	settextstyle(BOLD_FONT, HORIZ_DIR, 4);
	rectangle(80, 480, 575, 550);
	outtextxy(200, 500, "Enter de thoat");
	rectangle(680, 480, 1195, 550);
	outtextxy(775, 500, "ESC de tro ve menu");
	int ch;
	if (!kbhit())
	{
		ch = getch();
		if (ch == 13)
			exit(true);
		if (ch == 27)
			menu();
	}
}
void moPhongMau()
{
	char pause_key;
	bool pause = false;
	if (!kbhit())
		MauSapXep();
	else if (kbhit())
	{
		char ch = getch();
		if (ch == 27)
		{
			pause = true;
			if (pause == true)
				pause_key = getch();
		}
		else
			moPhongMau();
	}
}

void moPhongTuNhap()
{
	/* Màu nền */
	clearviewport();
	int Aquamarine = COLOR(127, 255, 212); //Màu ngọc xanh biển (Aquamarine)
	setbkcolor(Aquamarine);
	cleardevice();

	/* In ra thông báo */
	int Ruby_Red = COLOR(224, 17, 95); /* Màu đỏ ruby (Ruby Red) */
	setcolor(Ruby_Red);
	settextstyle(BOLD_FONT, HORIZ_DIR, 4);
	outtextxy(190, 30, "Xin moi chuyen sang cua so dong lenh de nhap ^^");

	/* Nhập các phần tử */
	for (int i = 0;i < 8;i++)
	{
		cout << BOLD_YELLOW_CMD_TEXT << "Phan tu thu " << i + 1 << ": ";
		cin >> int_arr[i];
	}
	cout << BOLD_GREEN_CMD_TEXT << "Nhap thanh cong ! Vui long chuyen ve lai man hinh do hoa";

	//Chuyển kiểu int sang kiểu char
	string t[8];
	for (int i = 0;i < 8;i++)
	{
		t[i] = to_string(int_arr[i]); //Từ int sang string
		array_element[i] = t[i].c_str(); //Từ string sang char
	}

	//In các phần tử ra màn hình đồ hoạ
	settextstyle(BOLD_FONT, HORIZ_DIR, 4);
	int Bronze = COLOR(205, 127, 50);
	setcolor(Bronze);
	outtextxy(460, 80, "DANH SACH PHAN TU");
	int Bright_Orange = COLOR(255, 172, 28);
	setcolor(Bright_Orange);
	int xText[8] = { 100,100,100,100,800,800,800,800 },
		yText[8] = { 150,220,290,360,150,220,290,360 };
	char const* chuThich[8] = { "Phan tu thu nhat:",
								"Phan tu thu hai:",
								"Phan tu thu ba:",
								"Phan tu thu tu:",
								"Phan tu thu nam:",
								"Phan tu thu sau:",
								"Phan tu thu bay:",
								"Phan tu thu tam:" };
	for (int i = 0;i < 8;i++)
		outtextxy(xText[i], yText[i], chuThich[i]);

	int xElement[8] = { 430,410,390,390,1110,1110,1110,1110 },
		yElement[8] = { 150,220,290,360,150,220,290,360 };
	for (int i = 0;i < 8;i++)
		outtextxy(xElement[i], yElement[i], array_element[i]);
	
	delay(1000);
	/* Phím chức năng */
	setcolor(GREEN);
	setlinestyle(SOLID_LINE, 0, THICK_WIDTH);
	settextstyle(BOLD_FONT, HORIZ_DIR, 4);
	rectangle(80, 480, 575, 550);
	outtextxy(100, 500, "Enter de bat dau sap xep");
	rectangle(680, 480, 1195, 550);
	outtextxy(700, 500, "ESC de huy va tro ve menu");

	int ch;
	if (!kbhit())
	{
		ch = getch();
		if (ch == 27) //Nếu ấn Escape
			menu(); //Về menu chính
		if (ch == 13) // Nếu ấn Enter
			MauTuNhap(); //Bắt đầu thuật toán
	}
}

void caiDat()
{
	clearviewport();
	/* Màu nền */
	int Dark_Purple = COLOR(48, 25, 52); //Màu tím đậm (Dark Purple)
	setbkcolor(Dark_Purple);
	cleardevice();
	/* Chuyển số sang chữ */
	string t; char const* n_char;
	t = to_string(speed);
	n_char = t.c_str();

	/* Nội dung */
	setcolor(YELLOW);
	settextstyle(BOLD_FONT, HORIZ_DIR, 5);
	outtextxy(550,150,"Cai dat");
	outtextxy(50, 200, "Toc do:");
	/*outtextxy(50, 250, "Hien tai:");
	outtextxy(280, 250, n_char);*/

	/* Các mức tốc độ */
	//x1: 10
	setcolor(YELLOW);
	circle(600, 220, 15);
	setfillstyle(SOLID_FILL, YELLOW);
	floodfill(600, 220, YELLOW);
	settextstyle(BOLD_FONT, HORIZ_DIR, 5);
	outtextxy(630, 200, "10");
	//x3: 30
	setcolor(YELLOW);
	circle(850, 220, 15);
	setfillstyle(SOLID_FILL, YELLOW);
	floodfill(850, 220, YELLOW);
	settextstyle(BOLD_FONT, HORIZ_DIR, 5);
	outtextxy(880, 200, "30");
	//x5: 50
	circle(1100, 220, 15);
	setfillstyle(SOLID_FILL, YELLOW);
	floodfill(1100, 220, YELLOW);
	settextstyle(BOLD_FONT, HORIZ_DIR, 5);
	outtextxy(1130, 200, "50");

	/* Hiện mức tốc độ cũ */
	if (speed == 10)
	{
		//x1: 10
		setcolor(RED);
		circle(600, 220, 15);
		setfillstyle(SOLID_FILL, RED);
		floodfill(600, 220, RED);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(630, 200, "10");
		//x3: 30
		setcolor(YELLOW);
		circle(850, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(850, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(880, 200, "30");
		//x5: 50
		setcolor(YELLOW);
		circle(1100, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(1100, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(1130, 200, "50");
	}
	if (speed == 30)
	{
		//x1: 10
		setcolor(YELLOW);
		circle(600, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(600, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(630, 200, "10");
		//x3: 30
		setcolor(RED);
		circle(850, 220, 15);
		setfillstyle(SOLID_FILL, RED);
		floodfill(850, 220, RED);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(880, 200, "30");
		//x5: 50
		setcolor(YELLOW);
		circle(1100, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(1100, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(1130, 200, "50");
	}
	if (speed == 50)
	{
		//x1: 10
		setcolor(YELLOW);
		circle(600, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(600, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(630, 200, "10");
		//x3: 30
		setcolor(YELLOW);
		circle(850, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(850, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(880, 200, "30");
		//x5: 50
		setcolor(RED);
		circle(1100, 220, 15);
		setfillstyle(SOLID_FILL, RED);
		floodfill(1100, 220, RED);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(1130, 200, "50");
	}
	/* Phím chức năng */
	int ch; old_speed = speed;
	int Persimmon = COLOR(236, 88, 0);
	while (!kbhit())
	{
		ch = getch();
		if (ch == 27)
			menu();
		if (ch == 49)
		{
			//x1: 10
			setcolor(RED);
			circle(600, 220, 15);
			setfillstyle(SOLID_FILL, RED);
			floodfill(600, 220, RED);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(630, 200, "10");
			//x3: 30
			setcolor(YELLOW);
			circle(850, 220, 15);
			setfillstyle(SOLID_FILL, YELLOW);
			floodfill(850, 220, YELLOW);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(880, 200, "30");
			//x5: 50
			setcolor(YELLOW);
			circle(1100, 220, 15);
			setfillstyle(SOLID_FILL, YELLOW);
			floodfill(1100, 220, YELLOW);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(1130, 200, "50");

			setcolor(Persimmon);
			settextstyle(BOLD_FONT, HORIZ_DIR, 4);
			outtextxy(150, 350, "Da chon: 10. Enter de xac nhan hay Backspace de huy ?");
			ch = getch();
			if (ch == 13)
			{
				new_speed = 10;
				speed = new_speed;
				/* Xoá */
				setcolor(Dark_Purple);
				settextstyle(BOLD_FONT, HORIZ_DIR, 4);
				outtextxy(150, 350, "Da chon: 10. Enter de xac nhan hay Backspace de huy ?");
				/* Ghi mới */
				setcolor(GREEN);
				outtextxy(500, 350, "Thanh cong !");
			}
			if (ch == 8)
			{
				speed = old_speed;
				/* Xoá */
				setcolor(Dark_Purple);
				settextstyle(BOLD_FONT, HORIZ_DIR, 4);
				outtextxy(150, 350, "Da chon: 10. Enter de xac nhan hay Backspace de huy ?");
				/* Ghi mới */
				setcolor(Persimmon);
				outtextxy(500, 350, "Da huy.");
			}
		}
		if (ch == 50)
		{
			//x1: 10
			setcolor(YELLOW);
			circle(600, 220, 15);
			setfillstyle(SOLID_FILL, YELLOW);
			floodfill(600, 220, YELLOW);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(630, 200, "10");
			//x3: 30
			setcolor(RED);
			circle(850, 220, 15);
			setfillstyle(SOLID_FILL, RED);
			floodfill(850, 220, RED);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(880, 200, "30");
			//x5: 50
			setcolor(YELLOW);
			circle(1100, 220, 15);
			setfillstyle(SOLID_FILL, YELLOW);
			floodfill(1100, 220, YELLOW);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(1130, 200, "50");

			setcolor(Persimmon);
			settextstyle(BOLD_FONT, HORIZ_DIR, 4);
			outtextxy(150, 350, "Da chon: 30. Enter de xac nhan hay Backspace de huy ?");
			ch = getch();
			if (ch == 13)
			{
				new_speed = 30;
				speed = new_speed;
				/* Xoá */
				setcolor(Dark_Purple);
				settextstyle(BOLD_FONT, HORIZ_DIR, 4);
				outtextxy(150, 350, "Da chon: 30. Enter de xac nhan hay Backspace de huy ?");
				/* Ghi mới */
				setcolor(GREEN);
				outtextxy(500, 350, "Thanh cong !");
			}
			if (ch == 8)
			{
				speed = old_speed;
				/* Xoá */
				setcolor(Dark_Purple);
				settextstyle(BOLD_FONT, HORIZ_DIR, 4);
				outtextxy(150, 350, "Da chon: 30. Enter de xac nhan hay Backspace de huy ?");
				/* Ghi mới */
				setcolor(Persimmon);
				outtextxy(500, 350, "Da huy.");
			}
		}
		if (ch == 51)
		{
			//x1: 10
			setcolor(YELLOW);
			circle(600, 220, 15);
			setfillstyle(SOLID_FILL, YELLOW);
			floodfill(600, 220, YELLOW);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(630, 200, "10");
			//x3: 30
			setcolor(YELLOW);
			circle(850, 220, 15);
			setfillstyle(SOLID_FILL, YELLOW);
			floodfill(850, 220, YELLOW);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(880, 200, "30");
			//x5: 50
			setcolor(RED);
			circle(1100, 220, 15);
			setfillstyle(SOLID_FILL, RED);
			floodfill(1100, 220, RED);
			settextstyle(BOLD_FONT, HORIZ_DIR, 5);
			outtextxy(1130, 200, "50");

			setcolor(Persimmon);
			settextstyle(BOLD_FONT, HORIZ_DIR, 4);
			outtextxy(150, 350, "Da chon: 50. Enter de xac nhan hay Backspace de huy ?");
			ch = getch();
			if (ch == 13)
			{
				new_speed = 50;
				speed = new_speed;
				/* Xoá */
				setcolor(Dark_Purple);
				settextstyle(BOLD_FONT, HORIZ_DIR, 4);
				outtextxy(150, 350, "Da chon: 50. Enter de xac nhan hay Backspace de huy ?");
				/* Ghi mới */
				setcolor(GREEN);
				outtextxy(500, 350, "Thanh cong !");
			}
			if (ch == 8)
			{
				speed = old_speed;
				/* Xoá */
				setcolor(Dark_Purple);
				settextstyle(BOLD_FONT, HORIZ_DIR, 4);
				outtextxy(150, 350, "Da chon: 50. Enter de xac nhan hay Backspace de huy ?");
				/* Ghi mới */
				setcolor(Persimmon);
				outtextxy(500, 350, "Da huy.");
			}
		}
	}

	/* Hiện mức tốc độ mới (Nếu có thay đổi) */
	//outtextxy(50, 250, "Hien tai:");
	//outtextxy(280, 250, n_char);
	if (speed == 10)
	{
		//x1: 10
		setcolor(RED);
		circle(600, 220, 15);
		setfillstyle(SOLID_FILL, RED);
		floodfill(600, 220, RED);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(630, 200, "10");
		//x3: 30
		setcolor(YELLOW);
		circle(850, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(850, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(880, 200, "30");
		//x5: 50
		setcolor(YELLOW);
		circle(1100, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(1100, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(1130, 200, "50");
	}
	if (speed == 30)
	{
		//x1: 10
		setcolor(YELLOW);
		circle(600, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(600, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(630, 200, "10");
		//x3: 30
		setcolor(RED);
		circle(850, 220, 15);
		setfillstyle(SOLID_FILL, RED);
		floodfill(850, 220, RED);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(880, 200, "30");
		//x5: 50
		setcolor(YELLOW);
		circle(1100, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(1100, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(1130, 200, "50");
	}
	if (speed == 50)
	{
		//x1: 10
		setcolor(YELLOW);
		circle(600, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(600, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(630, 200, "10");
		//x3: 30
		setcolor(YELLOW);
		circle(850, 220, 15);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(850, 220, YELLOW);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(880, 200, "30");
		//x5: 50
		setcolor(RED);
		circle(1100, 220, 15);
		setfillstyle(SOLID_FILL, RED);
		floodfill(1100, 220, RED);
		settextstyle(BOLD_FONT, HORIZ_DIR, 5);
		outtextxy(1130, 200, "50");
	}
}

void menu()
{
	clearviewport();
	int Dark_Purple = COLOR(48, 25, 52); //Màu tím đậm (Dark Purple)
	setbkcolor(Dark_Purple);
	cleardevice();
	int Lime_Green = COLOR(50, 205, 50); //Màu xanh chanh (Lime Green)
	setcolor(Lime_Green);
	settextstyle(SANS_SERIF_FONT, HORIZ_DIR, 30);
	outtextxy(100, 100, "Giai thuat Selection Sort");
	readimagefile("logoDaiHocNhaTrang.jpg", 900, 50, 1100, 250);

	/* Tuỳ chọn */
	int Terra_Cotta = COLOR(227, 115, 94); //Màu cam đất (Terra Cotta)
	setcolor(Terra_Cotta);
	settextstyle(SANS_SERIF_FONT, HORIZ_DIR, 15);
	outtextxy(300, 300, "1. Mo phong mau voi so da cho truoc");
	outtextxy(300, 350, "2. Mo phong voi so tu nhap");
	outtextxy(300, 400, "3. Cai dat");
	outtextxy(300, 450, "4. Thoat");

	int ch;
	if (!kbhit())
	{
		ch = getch();
		if (ch == 49)
			moPhongMau();
		if (ch == 50)
			moPhongTuNhap();
		if (ch == 51)
			caiDat();
		if (ch == 52)
			exit(true);
	}
}

void trang_bia()
{
	/* Tiêu đề */
	int Dark_Purple = COLOR(48, 25, 52); //Màu tím đậm (Dark Purple)
	setbkcolor(Dark_Purple);
	cleardevice();
	int Lime_Green = COLOR(50, 205, 50); //Màu xanh chanh (Lime Green)
	setcolor(Lime_Green);
	settextstyle(SANS_SERIF_FONT, HORIZ_DIR, 30);
	outtextxy(100, 100, "Giai thuat Selection Sort");
	readimagefile("logoDaiHocNhaTrang.jpg", 900, 50, 1100, 250);

	/* Thông tin sinh viên */
	int Terra_Cotta = COLOR(227, 115, 94); //Màu cam đất (Terra Cotta)
	setcolor(Terra_Cotta);
	settextstyle(SANS_SERIF_FONT, HORIZ_DIR, 15);
	outtextxy(150, 300, "Ho va ten: Nguyen Duc Thinh");
	outtextxy(150, 350, "MSSV: 62134265");
	outtextxy(150, 400, "Lop: 62.CNTT-1");

	/* Hướng dẫn */
	delay(1000);
	int Aqua = COLOR(0, 255, 255); //Màu Xanh Nước Biển (Aqua Blue)
	setcolor(Aqua);
	outtextxy(450, 500, "An Enter de bat dau");

	int ch = getch();
	if (!kbhit())
	{
		if (ch == 13)
			menu();
	}
}

void screen()
{
	initwindow(1270, 600, "Chuong trinh mo phong giai thuat Selection Sort");
	trang_bia();
	//moPhongTuNhap();
	//menu();
	//moPhongMau();
	//caiDat();
	
	closegraph();
}

int main()
{
	screen();
	return 0;
}