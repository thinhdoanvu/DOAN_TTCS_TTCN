#include <stdio.h>
#include <dos.h>
#include <conio.h>
#include <graphics.h>
#include <stdlib.h>
#include <Windows.h>
#define MAX 100

int n;

void Nhapmang(int a[], int n)
{
	for(int i = 0; i < n; i++)
	{
		printf("Nhap phan tu thu a[%d]:", i);
		scanf("%d", &a[i]);
	}
}
void Xuatmang(int a[], int n)
{
	for(int i = 0; i < n; i++)
	{
		printf("%d ", a[i]);
	}
}
void QuickSort(int a[], int left, int right){
    //phan hoach day can sap thanh 3 phan
    int x = a[(left+right)/2];
    int i=left, j=right;
    while (i <= j){    
        while (a[i]<x){
            i++;
        }
        while (a[j]>x){
            j--;
        } 
        if (i<=j){
            int tg = a[i];
            a[i]=a[j];
            a[j]=tg;
            i++;
            j--;
        }
    }
    if (left<j)//de qui quick sort day ben trai
        QuickSort(a,left,j);
    if (i<right)//de quy quick sort day ben trai
        QuickSort(a,i,right);
}

int main()
{
	int A[MAX], n;
	printf("Nhap so phan tu: ");
	scanf("%d", &n);
	Nhapmang(A, n);
	Xuatmang(A, n);
	printf("\nMang sau khi sap xep: \n");
	QuickSort(A, 0, n - 1);
	Xuatmang(A, n);
	initwindow(1800, 1800);
	for(int i = 50; i < 1800; i +=130) {
		circle(i, 100, 40);
	}
	settextstyle(8, 0, 2);setcolor(10); setbkcolor(0); outtextxy(250, 500, "Thuat toan Quick-Sort: La thuat toan sap xep tot nhat hien nay dua tren ky thuat chia");
	settextstyle(8, 0, 2);setcolor(10); setbkcolor(0); outtextxy(250, 530, "de tri. Chon phan tu giua mang lam phan tu chot (pivot). Su dung so sanh va hoan doi");
	settextstyle(8, 0, 2);setcolor(10); setbkcolor(0); outtextxy(250, 560, "de tao ra 2 mang con. Mang dau tien gom nhung phan tu nho hon pivot. Mang thu 2 gom");
	settextstyle(8, 0, 2);setcolor(10); setbkcolor(0); outtextxy(250, 590, "nhung phan tu lon hon pivot. Qua trinh phan chia nay dien ra cho den khi do dai cua");
	settextstyle(8, 0, 2);setcolor(10); setbkcolor(0); outtextxy(250, 620, "cac mang con deu bang 1.");
	settextstyle(4, 0, 2);setcolor(12); setbkcolor(0); outtextxy(350, 680, "Sinh vien thuc hien: Nguyen Ngoc Thao - MSSV: 62139013");
	settextstyle(4, 0, 2);setcolor(12); setbkcolor(0); outtextxy(500, 710, "Giao vien huong dan: Doan Vu Thinh");
	//Hien thi cac so tren man hinh
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(30, 100, "20");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(160, 100, "72");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 100, "50");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420, 100, "63");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(550, 100, "45");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690, 100, "40");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 100, "10");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(950, 100, "24");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1080, 100, "78");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1200, 100, "42");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1340, 100, "12");
	settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1460, 100, "53");
		
	for(int j = 0; j < 300; j+=2) {
		setcolor(YELLOW);
		circle(180, 100, 40);
		circle(1350, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(180, 100, YELLOW);
		floodfill(1350, 100, YELLOW);
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(160, 100 + j, "72");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1340, 90 + j, "12");
		delay(5);
	}
	for(int k = 0; k < 1180; k+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(160 + k, 400, "72");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1340 - k, 390, "12");
		delay(5);
	}
	for(int i = 0; i < 300; i+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1340, 400 - i, "72");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(160, 400 - i, "12");
		delay(5);
	}
	
	
	
	for(int a = 0; a < 300; a+=2) {
		setcolor(WHITE);
		circle(180, 100, 40);
		circle(1350, 100, 40);
		setfillstyle(SOLID_FILL, BLACK);
		floodfill(180, 100, BLACK);
		floodfill(1350, 100, BLACK);
		
		setcolor(YELLOW);
		circle(310, 100, 40);
		circle(960, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(310, 100, YELLOW);
		floodfill(960, 100, YELLOW);
		
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 100 + a, "50");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(950, 90 + a, "24");
		delay(5);
	}
	for(int b = 0; b < 660; b+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290 + b, 400, "50");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(950 - b, 390, "24");
		delay(5);
	}
	for(int c = 0; c < 300; c+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(950, 400 - c, "50");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 400 - c, "24");
		delay(5);
	}
	
	
	
	for(int d = 0; d < 300; d+=2) {
		setcolor(WHITE);
		circle(310, 100, 40);
		circle(960, 100, 40);
		setfillstyle(SOLID_FILL, BLACK);
		floodfill(310, 100, BLACK);
		floodfill(960, 100, BLACK);
		
		setcolor(YELLOW);
		circle(440, 100, 40);
		circle(830, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(440, 100, YELLOW);
		floodfill(830, 100, YELLOW);
		
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420, 100 + d, "63");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 90 + d, "10");
		delay(5);
	}
	for(int e = 0; e < 400; e+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420 + e, 400, "63");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820 - e , 390, "10");
		delay(5);
	}
	for(int f = 0; f < 300; f+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 400 - f, "63");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420, 400 - f, "10");
		delay(5);
	}
	
	
	for(int g = 0; g < 300; g+=2) {
		setcolor(WHITE);
		circle(440, 100, 40);
		circle(830, 100, 40);
		setfillstyle(SOLID_FILL, BLACK);
		floodfill(440, 100, BLACK);
		floodfill(830, 100, BLACK);
		
		setcolor(YELLOW);
		circle(700, 100, 40);
		circle(570, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(700, 100, YELLOW);
		floodfill(570, 100, YELLOW);
		
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690, 100 + g, "40");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(550, 90 + g, "45");
		delay(5);
	}
	for(int h = 0; h < 140; h+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690 - h, 400, "40");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(550 + h, 390, "45");
		delay(5);
	}
	for(int l = 0; l < 300; l+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(550, 400 - l, "40");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690, 400 - l, "45");
		delay(5);
	}
	
	
	
	for(int m = 0; m < 300; m+=2) {
		
		setcolor(WHITE);
		circle(700, 100, 40);
		circle(570, 100, 40);
		setfillstyle(SOLID_FILL, BLACK);
		floodfill(700, 100, BLACK);
		floodfill(570, 100, BLACK);
		
		setcolor(YELLOW);
		circle(310, 100, 40);
		circle(440, 100, 40);
		circle(1090, 100, 40);
		circle(1480, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(310, 100, YELLOW);
		floodfill(440, 100, YELLOW);
		floodfill(1090, 100, YELLOW);
		floodfill(1480, 100, YELLOW);
		
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 100 + m, "24");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420, 90 + m, "10");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1080, 100 + m, "78");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1460, 90 + m, "53");
		delay(5);
	}
	for(int n = 0; n < 130; n+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290 + n, 400, "24");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420 - n, 390, "10");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1080 + 3*n, 400, "78");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1460 - 3*n, 390, "53");
		delay(5);
	}
	
	for(int o = 0; o < 300; o+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(420, 400 - o, "24");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 400 - o, "10");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1460, 400 - o, "78");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1080, 400 - o, "53");
		delay(5);
	}
	
	
	for(int p = 0; p < 300; p+=2) {
		setcolor(WHITE);
		circle(310, 100, 40);
		circle(440, 100, 40);
		circle(1090, 100, 40);
		circle(1480, 100, 40);
		setfillstyle(SOLID_FILL, BLACK);
		floodfill(310, 100, BLACK);
		floodfill(440, 100, BLACK);
		floodfill(1090, 100, BLACK);
		floodfill(1480, 100, BLACK);
		
		setcolor(YELLOW);
		circle(310, 100, 40);
		circle(50, 100, 40);
		circle(830, 100, 40);
		circle(1220, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(310, 100, YELLOW);
		floodfill(50, 100, YELLOW);
		floodfill(830, 100, YELLOW);
		floodfill(1220, 100, YELLOW);
		
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 100 + p, "10");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(30, 90 + p, "20");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 100 + p, "63");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1200, 90 + p, "42");
		delay(5);
	}
	
	for(int q = 0; q < 260; q+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290 - q, 400, "10");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(30 + q, 390, "20");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820 + q*1.45, 400, "63");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1200 - q*1.45, 390, "42");
		delay(5);
	}
	for(int r = 0; r < 300; r+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(30, 400 - r, "10");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(290, 400 - r, "20");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(1200, 400 - r, "63");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 400 - r, "42");
		delay(5);
	}
	

	
	for(int s = 0; s < 300; s+=2) {
		
		setcolor(WHITE);
		circle(310, 100, 40);
		circle(50, 100, 40);
		circle(830, 100, 40);
		circle(1220, 100, 40);
		setfillstyle(SOLID_FILL, BLACK);
		floodfill(310, 100, BLACK);
		floodfill(50, 100, BLACK);
		floodfill(830, 100, BLACK);
		floodfill(1220, 100, BLACK);
		
		setcolor(YELLOW);
		circle(700, 100, 40);
		circle(830, 100, 40);
		setfillstyle(SOLID_FILL, YELLOW);
		floodfill(700, 100, YELLOW);
		floodfill(830, 100, YELLOW);
		
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690, 100 + s, "45");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 90 + s, "42");
		delay(5);
	}

	for(int t = 0; t < 130; t+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690 + t, 400, "45");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820 - t, 390, "42");
		delay(5);
	}
	
	for(int u = 0; u < 300; u+=2) {
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(820, 400 - u, "45");
		settextstyle(0, 0, 3);setcolor(12); setbkcolor(0); outtextxy(690, 400 - u, "42");
		delay(5);
	}
	
	cleardevice();
	settextstyle(4, 0, 5);setcolor(12); setbkcolor(0); outtextxy(500, 100, "Da sap xep xong!");
	settextstyle(4, 0, 5);setcolor(12); setbkcolor(0); outtextxy(450, 200, "Mang sau khi sap xep");
	for(int i = 50; i < 1800; i +=130) {
		circle(i, 400, 40);
	}
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(30, 400, "10");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(160, 400, "12");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(290, 400, "20");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(420, 400, "24");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(550, 400, "40");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(690, 400, "42");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(820, 400, "45");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(950, 400, "50");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(1080, 400, "53");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(1200, 400, "63");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(1340, 400, "72");
	settextstyle(0, 0, 3);setcolor(10); setbkcolor(0); outtextxy(1460, 400, "78");
	settextstyle(4, 0, 5);setcolor(12); setbkcolor(0); outtextxy(150, 600, "Cam on thay, co va cac ban da theo doi!");
	delay(4000);
	closegraph();
	getch();
}
