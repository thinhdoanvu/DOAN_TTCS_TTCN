#include<stdio.h>
#include<winbgim.h>
#include<stdlib.h>
#define MAX 100
#define INPUT "input.txt"
#include <cstdlib>
#include <ctime>

void readfile();
void printpoints(struct toado m[MAX], int size);
void GUI_init();
void GUI_inputN();
void GUI_Random();
void GUI_Loadfile();
void GUI_Keyboard();
void mouse();
void InputN();
void Keyboard();
void Random();
void Reset();
void Exit();
void drawpoint(struct toado point,int color);
void drawpoints(struct toado points[MAX],int size);
void GUI_increase();
void GUI_decrease();
int partitionIncrease(struct toado arr[MAX], int left, int right);
void quickSortIncrease(struct toado arr[MAX], int left, int right);
void IncreaseSort(struct toado arr[MAX], int n);
int partitionDecrease(struct toado arr[MAX], int left, int right);
void quickSortDecrease(struct toado arr[MAX], int left, int right);
void DecreaseSort(struct toado arr[MAX], int n);
void Increase();
void Decrease();
//bien toan cuc
int sodinh;//so phan tu can sap xep
FILE *fp;
char buffer[10];
int enable_click =1;
int sorted = 0;//co kiem tra xem co sap xep hay chua
struct toado{
	int x;
	int y;
	int value;
	// Toán toan so sánh dua trên giá tri value
    bool operator<=(const toado& other) const {
        return value <= other.value;
    }
};
struct toado td[MAX];//moi td la 1 kieu toado(x,y,value)
void readfile(){
	cleardevice();
	GUI_Loadfile();
	fp=fopen(INPUT,"r");
	if(fp==NULL){
		printf("Find not found");
		return;
	}
	//else
	//doc dong dau tien cua tap tin
	fscanf(fp,"%d",&sodinh);
	printf("So phan tu can sap xep: %d\n",sodinh);
	//doc lan luot tung phan tu: moi phan tu cos 3 tham so: toado_x. toado_y, giatri
	
	for(int i=0;i<sodinh;i++){
		fscanf(fp,"%d %d %d",&td[i].x, &td[i].y, &td[i].value);
	}
	
	//in ra cac diem 
	printpoints(td,sodinh);
	fclose(fp);
}
void printpoints(struct toado m[MAX], int size){
	for(int i=0;i<size;i++){
		printf("%d %d %d\n",m[i].x, m[i].y, m[i].value);
	}
}
void GUI_init(){
	setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
	setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(9);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	
	//key board button 
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	
	//increase button 
	rectangle(20,650,220,760)	;
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	
	//decrease button  
	rectangle(270,650,470,760)	;
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	
	//Reset button 
	rectangle(520,650,720,760)	;
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760)	;
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");										
}
void GUI_inputN(){
	setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	setcolor(7);
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
	setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(14);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	setcolor(7);
	//key board button 
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	
	//increase button 
	rectangle(20,650,220,760);
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	
	//decrease button  
	rectangle(270,650,470,760);
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	
	//Reset button 
	rectangle(520,650,720,760);
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760);
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");								
}
void GUI_Random(){
	setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	setcolor(7);
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
	setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(7);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	//key board button 
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	setcolor(14);
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	setcolor(7);
	//increase button 
	rectangle(20,650,220,760);
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	
	//decrease button  
	rectangle(270,650,470,760);
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	
	//Reset button 
	rectangle(520,650,720,760);
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760);
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");		

								
}
void GUI_Keyboard(){
	setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	setcolor(7);
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
	setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(7);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	//key board button 
	setcolor(14);
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	setcolor(7);
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	
	//increase button 
	rectangle(20,650,220,760);
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	
	//decrease button  
	rectangle(270,650,470,760);
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	
	//Reset button 
	rectangle(520,650,720,760);
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760);
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");										
}
void GUI_Loadfile(){
	setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	setcolor(7);
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
	setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(7);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	
	//key board button 
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	
	setcolor(14);
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	setcolor(7);
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	
	//increase button 
	rectangle(20,650,220,760);
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	
	//decrease button  
	rectangle(270,650,470,760);
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	
	//Reset button 
	rectangle(520,650,720,760);
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760);
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");		

								
}
void GUI_increase(){
    setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	setcolor(7);
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
    setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(7);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	//key board button 
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	
	//increase button 
	setcolor(14);
	rectangle(20,650,220,760);
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	setcolor(7);
	//decrease button  
	rectangle(270,650,470,760);
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	
	//Reset button 
	rectangle(520,650,720,760);
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760);
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");		
		
}
void GUI_decrease(){
    setcolor(9);
	//main border
	setlinestyle(0,1,3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(20,20,975,600);
	//name	
	setcolor(7);
	rectangle(1020,650,1220,760)	;
	settextstyle(10,0,2);
    setcolor(12);
	outtextxy(1025,665,"GVHD: D.VU THINH");
	outtextxy(1025,695,"SVTH: LE.T.PHUOC");
	outtextxy(1025,725,"MSSV: 64131856");
	setcolor(7);
	//input number button
	rectangle(1020,20,1220,120);	
	settextstyle(10,0,4);
	outtextxy(1110,55,"N");
	//key board button 
	rectangle(1020,170,1220,280);
	settextstyle(10,0,4);
	outtextxy(1042,210,"Keyboard");
	
	//Load file button 
	rectangle(1020,330,1220,440);
	settextstyle(10,0,4);
	outtextxy(1035,370,"Load File");
	
	//Random button 
	rectangle(1020,490,1220,600);
	settextstyle(10,0,4);
	outtextxy(1060,527,"Random");
	
	//increase button 
	rectangle(20,650,220,760);
	settextstyle(10,0,4);
	outtextxy(45,690,"Increase");
	
	//decrease button
	setcolor(14);  
	rectangle(270,650,470,760);
	settextstyle(10,0,4);
	outtextxy(295,690,"Decrease");
	setcolor(7);
	//Reset button 
	rectangle(520,650,720,760);
	settextstyle(10,0,4);
	outtextxy(565,690,"Reset");
	
	//Exit button 
	rectangle(770,650,970,760);
	settextstyle(10,0,4);
	outtextxy(830,690,"Exit");		
	
}

//Su dung chuot de chon cac ham: N = , keyboard, loadfile, random, decreasing, increasing, reset, exit
void mouse(){
	int x_mouse;
	int y_mouse;
	while(enable_click){
		//get even mouse click
		if(ismouseclick(WM_LBUTTONDOWN)){
			//get position of mouse
			getmouseclick(WM_LBUTTONDOWN,x_mouse, y_mouse);
			//printf x,y mouse to console
			//printf("(%d,%d)",x_mouse,y_mouse);
			//checking for buttons
			//N button
			if(x_mouse > 1020 && x_mouse < 1220 && y_mouse >20 && y_mouse < 120){
				printf("INPUT FROM KEYBOARD\n");
				InputN();
				drawpoints(td,sodinh);			
			}	
			//keyboard button
			if(x_mouse > 1020 && x_mouse < 1220 && y_mouse >170 && y_mouse < 280){
				printf("INPUT FROM KEYBOARD\n");
				Keyboard();	
				drawpoints(td,sodinh);			
			}
			//load file button
			if(x_mouse > 1020 && x_mouse < 1220 && y_mouse >330 && y_mouse <440){		
				printf("INPUT FROM FILE\n");	
				readfile();	
				drawpoints(td,sodinh);	
			}				
			//Random button
			if(x_mouse > 1020 && x_mouse < 1220 && y_mouse >490 && y_mouse < 600){
				printf("RANDOM NUMBER\n");
				Random();
				drawpoints(td,sodinh);				
			}	
			//Increase button
			if(x_mouse > 20 && x_mouse < 220 && y_mouse > 650 && y_mouse < 760){
				printf("Increasing...\n");
				Increase();			
			}	
			//Decrease button
			if(x_mouse > 270 && x_mouse < 470 && y_mouse > 650 && y_mouse < 760){
				printf("Decreasing...\n");
				Decrease();			
			}	
			//Reset button
			if(x_mouse > 520 && x_mouse < 720 && y_mouse > 650 && y_mouse < 760){
				if (!sorted) {
                	Reset();
            	}			
			}	
			//Exit button
			if(x_mouse > 770 && x_mouse < 970 && y_mouse > 650 && y_mouse < 760){
				Exit();			
			}			
		}
		//check right mouse click to exit loop
		if(ismouseclick(WM_RBUTTONDOWN)){
			getmouseclick(WM_RBUTTONDOWN,x_mouse, y_mouse);
			printf("\nExiting...");
		break;
	}
	delay(100);//wait for next cycle mouse click
	}		
}
void InputN(){
	cleardevice();
	GUI_inputN();
    do {
        printf("Nhap so luong phan tu:\t");
        scanf("%d", &sodinh);
        if (sodinh < 2 || sodinh >= 10) {
            printf("Vui long nhap lai so luong phan tu trong khoang tu 2 den 9!\n");
        }
    } while (sodinh < 2 || sodinh >= 10);
    for (int i = 0; i < sodinh; i++) {
        if (sodinh == 2) {
            td[i].x = 350 + (i * 100);
            td[i].y = 200;
        } 
		else if(sodinh==3){
			td[i].x =270 +(i*100);
			td[i].y = 200;
		}
		else if(sodinh==4){
			td[i].x =250 +(i*100);
			td[i].y = 200;
		}
		else if(sodinh==5){
			td[i].x =170 +(i*100);
			td[i].y = 200;
		}	
		else if(sodinh==6){
			td[i].x =150 +(i*100);
			td[i].y = 200;
		}
		else if(sodinh==7){
			td[i].x =100 +(i*100);
			td[i].y = 200;
		}	
		else if(sodinh==8){
			td[i].x =50 +(i*100);
			td[i].y = 200;
		}	
		else if(sodinh==9){   	
			td[i].x =i*98;
			td[i].y = 200;
		}
		//nhap gia tri cho cac diem
		printf("\ntd[%d].value = ",i);
		scanf("%d",&td[i].value);
    }
    // In ra các diem
    printpoints(td, sodinh);
    printf("\nFinished!\n");
}

void Keyboard(){
	cleardevice();
	GUI_Keyboard();
	//read data from keyboard
	fp=fopen(INPUT,"r");
	if(fp==NULL){
		printf("Find not found");
		return;
	}
	//else
	//doc dong dau tien cua tap tin
	fscanf(fp,"%d",&sodinh);
	//doc lan luot tung phan tu: moi phan tu cos 3 tham so: toado_x. toado_y, giatri
	
	for(int i=0;i<sodinh;i++){
		fscanf(fp,"%d %d %d",&td[i].x, &td[i].y, &td[i].value);
		//nhap lai gia tri cho cac diem
		printf("\ntd[%d].value = ",i);
		scanf("%d",&td[i].value);
	}
	//in ra cac diem 
	printpoints(td,sodinh);
	printf("Finished!\n");
	fclose(fp);
}
void drawpoint(struct toado point, int color) {
    setcolor(color);

    int barWidth = 30;  // Do rong cua moi cot
    int scaledBarHeight = 10 * point.value;  // chieu cao moi cot

    // Ve cot do thi
    bar(point.x + 80, point.y + 80 + 100 - scaledBarHeight, point.x + 80 + barWidth, point.y + 80 + 100);

    settextstyle(1, 0, 3);

    // Tinh chieu rong va cao cua so
    int textWidth = textwidth(itoa(point.value, buffer, 10));
    int textHeight = textheight(itoa(point.value, buffer, 10));

    // Xac dinh vi tri cua so
    int textX = point.x + 80 + barWidth / 2 - textWidth / 2;
    int textY = point.y + 80 + 100 + textHeight;

    // Ve so
    outtextxy(textX, textY, itoa(point.value, buffer, 10));
}

void drawpoints(struct toado points[MAX],int size){
	for(int i=0;i<size;i++){
		drawpoint(points[i],8);//doi mau so o day: drawpoint(points[i],color)
		delay(100);
	}
}

void Random() {
	cleardevice();
	GUI_Random();
    // Set seed ngau nhien dua tren thoi gian hien tai
    srand(time(0));
    // tao ngau nhien so luong phan tu tu 2 den 10
    sodinh = rand() % 9 + 2;
    printf("So luong phan tu la: %d\n",sodinh);
    // kiem tra gia tri da su dung hay chua
    int usedValues[10] = {0};

    // tao gia tri ngau nhien
    for (int i = 0; i < sodinh; i++) {
        if (sodinh == 2) {
            td[i].x = 350 + (i * 100);
            td[i].y = 200;
        } 
		else if(sodinh==3){
			td[i].x =270 +(i*100);
			td[i].y = 200;
		}
		else if(sodinh==4){
			td[i].x =250 +(i*100);
			td[i].y = 200;
		}
		else if(sodinh==5){
			td[i].x =170 +(i*100);
			td[i].y = 200;
		}	
		else if(sodinh==6){
			td[i].x =150 +(i*100);
			td[i].y = 200;
		}
		else if(sodinh==7){
			td[i].x =100 +(i*100);
			td[i].y = 200;
		}	
		else if(sodinh==8){
			td[i].x =50 +(i*100);
			td[i].y = 200;
		}	
		else if(sodinh==9){   	
			td[i].x =i*98;
			td[i].y = 200;
		}
		else if(sodinh==10){
			td[i].x =i*88;
			td[i].y = 200;
		
		}
		 do {
            td[i].value = rand() % 10;
        } while (usedValues[td[i].value]);

        //danh dau gia tri da su dung
        usedValues[td[i].value] = 1;
    }

    printpoints(td, sodinh);
    printf("\nFinished!\n");
}

int partitionIncrease(struct toado arr[], int left, int right) {
    toado pivot = arr[left]; // Cho vi tri dau tien làm (pivot)
    drawpoint(arr[left], 14);//to mau cho pivot
    delay(800);
    int count=0;
    //dem so luong phan tu nam ben trai pivot
    for(int i=left+1;i<=right; i++){
    	if(arr[i].value<=pivot.value)
    	count++;
	}
	//lay vi tri cho gia tri pivot 
    int pivotIndex= left+count;
    int temp;
    // hoan vi
    drawpoint(arr[left], 10);
    drawpoint(arr[pivotIndex], 10);
    delay(800);
    
    temp = arr[left].value;
    arr[left].value = arr[pivotIndex].value;
    arr[pivotIndex].value= temp;
    
    drawpoint(arr[left], 10);
    drawpoint(arr[pivotIndex], 10);
    delay(800);
    
    int i=left;
    int j=right;
    while(i<pivotIndex && j>pivotIndex){
    	while(arr[i].value <= pivot.value)
    	{
    		i++;
		}
		while(arr[j].value > pivot.value)
		{
			j--;
		}
		if(i<pivotIndex && j>pivotIndex)
		{
			
			drawpoint(arr[i], 10);
            drawpoint(arr[j], 10);
            delay(800);
			temp = arr[i].value;
            arr[i].value = arr[j].value;
            arr[j].value= temp;
			drawpoint(arr[i], 10);
            drawpoint(arr[j], 10);
            delay(800);
		}
	}
	return pivotIndex;
    
}
void quickSortIncrease(struct toado arr[], int left, int right) {
    if (right <=  left){
	    return;
	 }
        int pivot = partitionIncrease(arr, left, right);
        //sap xep day ben trai
        quickSortIncrease(arr, left, pivot - 1);  
        // Sap xep day  bên phai
        quickSortIncrease(arr, pivot + 1, right); 
}
void IncreaseSort(struct toado arr[MAX], int n) {
    sorted = 1; // Ðang trong quá trình s?p x?p

    // goi ham quickSort der sx
    quickSortIncrease(arr, 0, n - 1);

    Reset(); // Sau khi s?p x?p xong, kích ho?t nút Reset
}

void Increase() {
    // Khi nhan nút Increase - mouse click = false
    enable_click = 0;

    // Hien thi giao dien sap xep
    GUI_increase();

    // Goi hàm sxep
    IncreaseSort(td, sodinh);

    // Hien thi thái sau khi hoàn thanh
    for (int i = 0; i < sodinh; i++) {
        drawpoint(td[i], 10);
    }
}
//quicksort giam dan
int partitionDecrease(struct toado arr[], int left, int right) {
    toado pivot = arr[left]; // cho vi tri dau tiên làm pivot
    drawpoint(arr[left], 14); // Tô màu cho pivot
    delay(800);
    int count = 0;
    // dem so luong
    for (int i = left + 1; i <= right; i++) {
        if (arr[i].value >= pivot.value)
            count++;
    }
    // lay vi tri cho gia tri pivot
    int pivotIndex = left + count;
    int temp;
    // Hoán vi
    
    drawpoint(arr[left], 10);
    drawpoint(arr[pivotIndex], 10);
    delay(800);
    
    temp = arr[left].value;
    arr[left].value = arr[pivotIndex].value;
    arr[pivotIndex].value = temp;

    drawpoint(arr[left], 10);
    drawpoint(arr[pivotIndex], 10);
    delay(800);

    int i = left;
    int j = right;
    while (i < pivotIndex && j > pivotIndex) {
        while (arr[i].value >= pivot.value) {
            i++;
        }
        while (arr[j].value < pivot.value) {
            j--;
        }
        if (i < pivotIndex && j > pivotIndex) {
            drawpoint(arr[i], 10);
            drawpoint(arr[j], 10);
            delay(800);
            
			temp = arr[i].value;  
            arr[i].value = arr[j].value;
            arr[j].value = temp;
            
            drawpoint(arr[i], 10);
            drawpoint(arr[j], 10);
            delay(800);
        }
    }
    return pivotIndex;
}

void quickSortDecrease(struct toado arr[MAX], int left, int right) {
    if (right <= left) {
        return;
    }
    int pivot = partitionDecrease(arr, left, right);
    // Sap xxep mang ben trai
    quickSortDecrease(arr, left, pivot - 1);
    // Sap xep mang ben phai
    quickSortDecrease(arr, pivot + 1, right);
}

void DecreaseSort(struct toado arr[MAX], int n) {
    sorted = 1; // Ðang trong quá trình sx

    //goi ham quickSortDecrease de sx giam dan
    quickSortDecrease(arr, 0, n - 1);

    Reset(); // Sau khi sx xong, kích hoat nút Reset
}

void Decrease() {
    //when click Decrease button - mouse click = fasle
    enable_click = 0;
    //load GUI_increase
    GUI_decrease();

    DecreaseSort(td, sodinh);
    
    // Print all values after finish
    for (int i = 0; i < sodinh; i++) {
        drawpoint(td[i], 10);
    }
}
void Reset() {
	sorted = 0; //dat co ve 0
    enable_click = 1; 
    cleardevice();
	GUI_init();
}

void Exit() {
    closegraph();
    exit(0); 
}
int main(){
	
	//ve giao dien
	initwindow(1250,800);
	
	GUI_init();
	//dung chuot
	mouse();
	//dung man hinh
	getch();
	return 0;
} 


