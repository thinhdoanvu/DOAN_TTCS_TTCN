#include <stdio.h>
#include <stdlib.h>
#include<iostream>
#include<windows.h>
#include <graphics.h>
#define MAX 100
#include<math.h>
#define PI 3.14159265358979323846

using namespace std;
//Khai bao ham
void drawframe();
void drawButton(int left, int top, int right, int bottom, const char* label);
bool isMouseHover(int left, int top, int right, int bottom);
void handleMouseHover(int left, int top, int right, int bottom, const char* label, bool &hovered);
void drawEdgeCH(int vertex1, int vertex2, int color);
void drawgraph();
void clearGraph();
void cleanGraph();
void inmang();
void drawVertex(int vertex, int color);
void drawEdge(int vertex1, int vertex2, int color);
void dfs(int current, int end, int n);
void DFS_display();
void openAndReadFile(const char* filePath);
void handleClick(int x, int y);
void mouse();
void waitForKeypress();
void drawEdges();
bool isDirectedGraph();
bool isPositionValid(int x, int y);
//Cac bien danh dau
bool isResetMode = false; // Bien danh dau reset
bool isGraphLoaded = false;//Bien xac dinh xem do thi da duoc nap hay chua 
bool isDFSExecuted = false;// Bien check dfs da chay bao gio chua
//DFS
int dothi[MAX][MAX];
int path[MAX];
int len = 0;
int OPEN[MAX];     // Danh sach OPEN chua cac dinh dang cho xet
int CLOSE[MAX];    // Danh sach CLOSE chua cac dinh da xet
int CHA[MAX];      // Mang luu cha cua cac dinh
int OPENED[MAX];   // danh sach cac dinh da duoc dua vao
//Graphics
int sodinh;
struct toado {
    int x;
    int y;
    int label;
};
struct toado td[MAX];
FILE *fp;
char buffer[10];
int mtk[MAX][MAX];// ma tran ke
int nodeCount = 0; // So luong node da duuc tao
bool isCreatingNodes = false; //trang thai tao node
int nodesCreated[MAX]; // Mang luu tru trang thái các node dã tao


//Doc file toa do va ma tran ke
void openAndReadFile(const char* filePath) {
    fp = fopen(filePath, "r");
    if (fp == NULL) {
        printf("File not found");
    } else {
        fscanf(fp, "%d", &sodinh);
    for (int i = 0; i < sodinh; i++) {
            for (int j = 0; j < sodinh; j++) {
                fscanf(fp, "%d", &mtk[i][j]);
            }
        }
    }

    isGraphLoaded = true;
    fclose(fp);
}

bool isDirectedGraph() {
    for (int i = 0; i < sodinh; i++) {
        for (int j = 0; j < sodinh; j++) {
            if (mtk[i][j] != mtk[j][i]) {
                return true;  
            }
        }
    }
    return false;
}

//Ve do thi
void drawgraph(){
	//Hien thi toa do cua dinh va mtk
    settextstyle(1, 0, 3);
    for (int i = 0; i < sodinh; i++) {
        drawVertex(i, WHITE);
        outtextxy(td[i].x - 10, td[i].y - 10, itoa(td[i].label, buffer, 10));
    }
    for (int i = 0; i < sodinh; i++) {
        for (int j = 0; j < sodinh; j++) {
            if (mtk[i][j] == 1) {
                if (!isDirectedGraph()) {
                    drawEdge(i, j, WHITE);
                } else {
                    drawEdgeCH(i, j, WHITE);
                }
            }
        }
	}
}

void drawEdges() {
    for (int i = 0; i < sodinh; i++) {
        for (int j = 0; j < sodinh; j++) {
            if (mtk[i][j] == 1) {
                if (!isDirectedGraph()) {
                    drawEdge(i, j, WHITE);
                } else {
                    drawEdgeCH(i, j, WHITE);
                }
            }
        }
    }
}

const int MIN_DISTANCE = 2 * 20 + 10; // Khoang cach toi thieu giua hai nut (bao gom khoang trang)( r=20)
// Ham kiem tra khoang cach giua cac nut
bool isPositionValid(int x, int y) {
    for (int i = 0; i < nodeCount; i++) {
        int dx = td[i].x - x;
        int dy = td[i].y - y;
        int distanceSquared = dx * dx + dy * dy;
        if (distanceSquared < MIN_DISTANCE * MIN_DISTANCE) {
            return false; 
        }
    }
    return true; 
}

//Ham xu ly thao tac
void handleClick(int x, int y) {
	//Open file
	if(x >= 800 && x <= 925 && y >= 10 && y <= 60){
		OPENFILENAME ofn;
		TCHAR szFile[MAX_PATH];
		TCHAR szFolder[MAX_PATH];
		// Lay duong dan den thu muc hien tai cua chuong trinh
		GetCurrentDirectory(MAX_PATH, szFolder);
		ZeroMemory(&ofn, sizeof(OPENFILENAME));
		ofn.lStructSize = sizeof(OPENFILENAME);
		ofn.hwndOwner = NULL;
		ofn.lpstrFile = szFile; ofn.lpstrFile[0] = '\0';
		ofn.nMaxFile = sizeof(szFile);
		ofn.lpstrFilter = TEXT("All Files (*.*)\0*.*\0");
		ofn.nFilterIndex = 1; ofn.lpstrInitialDir = szFolder; //Su dung thu muc hien tai lam thu muc mac dinh
			if (GetOpenFileName(&ofn)) {
		    	const char* filePath = ofn.lpstrFile;
		    	openAndReadFile(filePath);
		    	ZeroMemory(szFile, sizeof(szFile));
				clearGraph();
		        drawframe();
		        nodeCount = 0;
		        isCreatingNodes = true;
		        settextstyle(1, 0, 2);
			    setcolor(WHITE);
			    outtextxy(20, 490, (char*)"CLICK CHUOT VAO DE TAO NUT.");
			}
	}
    if (isCreatingNodes && nodeCount < sodinh) {
		int xCenter = mousex();
		int yCenter = mousey();
		
		if (xCenter >= 30 && xCenter <= 750 && yCenter >= 70 && yCenter <= 385) {
		    // Neu dang tao node và chua du so luong node
		    if (isCreatingNodes && nodeCount < sodinh) {
		    	if (isPositionValid(xCenter, yCenter)) {
			        // Luu taa do và label cua node
			        td[nodeCount].x = xCenter;
			        td[nodeCount].y = yCenter;
			        td[nodeCount].label = nodeCount;
			        drawVertex(nodeCount, WHITE);
			        settextstyle(1, 0, 2);  
		            char buffer[10];
		            itoa(td[nodeCount].label, buffer, 10);  
		            outtextxy(xCenter - 10, yCenter - 10, buffer); 
			        nodeCount++;
			
			        // Neu da tao du so luong node, dung tao node
			        if (nodeCount >= sodinh) {
			            isCreatingNodes = false;
			            drawEdges();
			        }
			    }
		    }
		}

    }
    if(nodeCount>0){
    	settextstyle(1, 0, 2);
		setcolor(BLACK);
		outtextxy(20, 490, (char*)"SUCCESS! CLICK CHUOT VAO DE TAO NUT.");
	}
	//Author
	if(x >= 800 && x <= 925 && y >= 330 && y <= 380){
		cleanGraph(); drawframe();
		settextstyle(10, 0, 1);
    	outtextxy(250, 130, (char*)"GVHD: Th.S. DOAN VU THINH");
    	outtextxy(250, 180, (char*)"SVTH: NGUYEN MINH TAI");
    	outtextxy(250, 230, (char*)"MSSV: 64132077");
	}
	
	//Start
    if (x >= 800 && x <= 925 && y >= 90 && y <= 140) {
    
	    if ((isGraphLoaded || isResetMode) ) {
	    		if(nodeCount == sodinh){
			        if (!isDFSExecuted) {
			            DFS_display(); 
			            isDFSExecuted = true;
			        } else {
			            cleanGraph();
			            drawframe();
			            drawgraph(); 
			            DFS_display(); 
			            isGraphLoaded = true;
			        	}
	   			}
		}
		else
		{
			setcolor(WHITE);
	        cleanGraph();
	        drawframe();
	        outtextxy(295, 140, (char*)"NO GRAPH TO START");
	        outtextxy(160, 190, (char*)"CLICK THE 'Load file' BUTTON TO ADD GRAPH");
		}
	}

	
    //Reset
    if (x >= 800 && x <= 925 && y >= 250 && y <= 300) {
	    if (nodeCount > 0) {
			    cleanGraph();
			    drawframe();
						    isCreatingNodes = true;
			    isDFSExecuted = false;
			    isResetMode = true;
			
			    // Xoa toàn bo toa do cac nut
			    for (int i = 0; i < sodinh; i++) {
			        td[i].x = 0;
			        td[i].y = 0;
			        td[i].label = -1; // Dat gia tri mac dinh cho label
			    }
			    nodeCount = 0;			
			    settextstyle(1, 0, 2);
			    setcolor(WHITE);
			    outtextxy(20, 490, (char*)"SUCCESS! CLICK CHUOT VAO DE TAO NUT.");
	    }
	    isGraphLoaded = false;
	}
    //Delete
    if (x >= 800 && x <= 925 && y >= 170 && y <= 220) {
    	isResetMode= false;
        cleanGraph();
        drawframe();
        outtextxy(280, 140, (char*)"DATA HAS BEEN DELETED");
    	outtextxy(160, 190, (char*)"CLICK THE 'Load file' BUTTON TO ADD GRAPH");
    }
    //Exit
    if (x >= 800 && x <= 925 && y >= 410 && y <= 460) {
        int msgboxID = MessageBox(NULL, TEXT("Ban có chac chan muon thoat?"), TEXT("Xac nhan"), MB_ICONQUESTION | MB_OKCANCEL);
    	if (msgboxID == IDOK) {
        	closegraph();  
        	exit(0); 
    	}
    }
}

//Kiem tra hover
bool isMouseHover(int left, int top, int right, int bottom) {
    int x = mousex();
    int y = mousey();
    if (x >= left && x <= right && y >= top && y <= bottom) {
        return true; // Chuot di chuyen vao trong vung cua button
    }
    return false; // Chuot di chuyen ra khoi vung cua button
}

//Xu ly khi hover vao button
void handleMouseHover(int left, int top, int right, int bottom, const char* label, bool &hovered) {
    char buffer[MAX]; // Khai báo buffer luu du lieu chuoi
    if (isMouseHover(left, top, right, bottom)) {
        setcolor(RED);
        rectangle(left, top, right, bottom);
        settextstyle(10, 0, 1);

        sprintf(buffer, "%s", label); //Dinh dang chuoi duoc luu vao buffer
        outtextxy(left + 10, top + 10, buffer); // Hien thi noi dung cua buffer

        hovered = true;
    } else if (hovered) {
        setcolor(WHITE);
        rectangle(left, top, right, bottom);
        settextstyle(10, 0, 1);
        
        sprintf(buffer, "%s", label); 
        outtextxy(left + 10, top + 10, buffer);
        hovered = false;
    }
}

//Ham ve button
void drawButton(int left, int top, int right, int bottom, const char* label) {
	
    setcolor(WHITE);
	setlinestyle(0, 1, 3);
    rectangle(left, top, right, bottom);
    settextstyle(10, 0, 1);

    char buffer[MAX];
    strcpy(buffer, label);
    outtextxy(left + 10, top + 10, buffer);
}


//Ve khung do hoa
void drawframe() {
    setcolor(WHITE);
    settextstyle(3, 0, 3);
    outtextxy(250, 20, (char*)"DFS GRAPH VISUALIZATION");
    setlinestyle(0, 1, 3);
    rectangle(10, 10, 770, 50);
    setlinestyle(0, 1, 3);
    rectangle(10, 50, 770, 470);
    setlinestyle(0, 1, 3);
    rectangle(10, 410, 770, 470);
    rectangle(10, 480, 770, 580);
    settextstyle(10, 0, 1);
    // Ve cac nut
    drawButton(800, 10, 925, 60, "Load file");
	drawButton(800, 90, 925, 140,  "Starting");
    drawButton(800, 170, 925, 220, "Delete");
    drawButton(800, 250, 925, 300, "Reset");
    drawButton(800, 330, 925, 380, "Author");	
	drawButton(800, 410, 925, 460, "Exit");
}


//Xoa do thi
void clearGraph(){
	isDFSExecuted=false;
	memset(CLOSE, 0, sizeof(CLOSE));
	memset(path, 0, sizeof(path));
	len = 0;
	cleardevice();
}

//Xoa do thi
void cleanGraph(){
	memset(CLOSE, 0, sizeof(CLOSE));
	memset(path, 0, sizeof(path));
	len = 0;
	cleardevice();
	isGraphLoaded = false;//Gan ve false sau khi xoa do thi the hien chua nap
	
}

//hien thi mang
void inmang(int mang[], int size){
	for(int i=0; i<size; i++){
		printf("%d  ",mang[i]);
	}
}

// Ve dinh
void drawVertex(int vertex, int color) {
    setcolor(color);
    circle(td[vertex].x, td[vertex].y, 20);
}
// Ve canh vo huong
void drawEdge(int vertex1, int vertex2, int color) {
    setcolor(color);
    setlinestyle(SOLID_LINE, 0, 3);
    // Tinh toan vector huong giua hai dinh
    int dx = td[vertex2].x - td[vertex1].x;
    int dy = td[vertex2].y - td[vertex1].y;
    // Tinh toan do dài cua canh (quang duong giua 2 dinh)
    float length = sqrt(dx * dx + dy * dy);
    int radius = 20;
    // tinh toan diem bat dau tren duong tron cua vertex1
    float ratio1 = radius / length;
    int startX = td[vertex1].x + ratio1 * dx;
    int startY = td[vertex1].y + ratio1 * dy;
    // Tinh toan diem ket thuc tren duong tròn cua vertex2
    float ratio2 = radius / length;
    int endX = td[vertex2].x - ratio2 * dx;
    int endY = td[vertex2].y - ratio2 * dy;
    line(startX, startY, endX, endY);

}
// Ve canh huong di
void drawEdgeCH(int vertex1, int vertex2, int color) {
    setcolor(color);
    setlinestyle(SOLID_LINE, 0, 3);
    int dx = td[vertex2].x - td[vertex1].x;
    int dy = td[vertex2].y - td[vertex1].y;
    float length = sqrt(dx * dx + dy * dy);
    int radius = 20;
    // Tinh ty le ve canh sao cho tranh ve cat dinh
    float ratio1 = radius / length;
    int startX = td[vertex1].x + ratio1 * dx;
    int startY = td[vertex1].y + ratio1 * dy;
    float ratio2 = radius / length;
    int endX = td[vertex2].x - ratio2 * dx;
    int endY = td[vertex2].y - ratio2 * dy;
    line(startX, startY, endX, endY);
    int arrowSize = 10; // Kich thuoc mui ten
    float arrowAngle = atan2(dy, dx);  // Goc cua duong thang
    float angle1 = arrowAngle + M_PI / 6;  // Goc mat phia cua mui ten
    float angle2 = arrowAngle - M_PI / 6;  // Goc phia con lai
    // Tinh toan cac diem cua mui ten
    int x1 = endX - arrowSize * cos(angle1);
    int y1 = endY - arrowSize * sin(angle1);
    int x2 = endX - arrowSize * cos(angle2);
    int y2 = endY - arrowSize * sin(angle2);
    // Ve mui ten
    line(endX, endY, x1, y1);  // Mot canh cua mui ten
    line(endX, endY, x2, y2);  // Canh còn lai cua mui ten
}



//Thuat toan
void dfs(int start, int goal, int n) {
    int dem = 0;  // So luong dinh trong OPEN
    int visitedEdges[MAX][MAX] = {0};  // Ma tran luu trang thai cac canh da duyet
    // Khoi tao
    for (int i = 0; i < n; i++) {
        CLOSE[i] = i;   // Chua xet
        OPENED[i] = i;
        CHA[i] = -1;    // Khong co cha
    }
    OPEN[dem++] = start;  // Them dinh bat dau vào OPEN
    // Bat dau duyet
    while (dem > 0) {
        int current = OPEN[--dem];  // Lay dinh cuoi cung trong OPEN
        printf("\nDinh dang xet: %d", current);
        CLOSE[current] = -1;        // Ðua dinh này vào CLOSE, danh dau da xet

        // ve dinh hien tai
        drawVertex(current, RED);  
        delay(500);

        // Neu tim thay dich
        if (current == goal) {
        	printf("\nTim thay duong di tu %d den %d.\n", start, goal);
            // Truy vet duong di
            len = 0;
			for(int i=goal; i!=-1; i=CHA[i]){
				path[len++]=i;
			}
            // In ra duong di
            printf("\nDuong di: ");
            for (int i = len - 1; i >= 0; i--) {
                printf("%d ", path[i]);
            }

            // Hien thi duong di tren man hinh
            char buffer[MAX];
            buffer[0] = '\0';
            for (int i = len - 1; i >= 0; i--) {
                char temp[10];
                sprintf(temp, "%d ", path[i]);
                strcat(buffer, temp);
            }
            settextstyle(1, 0, 2);
            setcolor(WHITE);
            outtextxy(20, 490, (char*)"DFS:");
            outtextxy(100, 490, buffer);
            delay(1000);
            // ve lai do thi
            drawframe();
            drawgraph();

            // ve lai cac canh da xet
            for (int i = 0; i < n; i++) {
                for (int j = 0; j < n; j++) {
                    if (visitedEdges[i][j] && CLOSE[i] == -1 && CLOSE[j] == -1) {
                        drawVertex(j, RED); 
						if (!isDirectedGraph()) {
		                    drawEdge(i, j, RED);
		                } else {
		                    drawEdgeCH(i, j, RED);
		                    if (mtk[j][i] == 1) {
                                drawEdgeCH(j, i, RED);  
                            }
		                }         
                    }
                }
            }

            // ve lai duong di dung
            for (int i = len - 1; i > 0; i--) {
            	if (!isDirectedGraph()) {
		            drawEdge(path[i], path[i - 1], BLUE);
		        } else {
		            drawEdgeCH(path[i], path[i - 1], BLUE);
		            if (mtk[path[i - 1]][path[i]] == 1) {
                            drawEdgeCH(path[i - 1], path[i], BLUE); 
                        }
		        } 
                drawVertex(path[i], BLUE);              
            }
            drawVertex(path[0], BLUE);  // ve dinh dau tien
            printf("\n");
            return;
        }
        if(!isDirectedGraph()){
        // Them các dinh ke vào OPEN
        	for (int i = n - 1; i >= 0; i--) {
	            if (mtk[current][i] == 1 && CLOSE[i] != -1 && OPENED[i] != -1) {
	                OPEN[dem++] = i;  // Thêm dinh vào OPEN
	                OPENED[i] = -1;   // Ðánh dau dã tham
	                CHA[i] = current; // Luu cha cua dinh nay
			        drawEdge(current, i, RED);    
		            visitedEdges[current][i] = 1;	
					delay(500);               
	            }
	        }
        }
        else{
	        for (int i = n - 1; i >= 0; i--) {
		        if ((mtk[current][i] == 1) && CLOSE[i] != -1 && OPENED[i] != -1) {
		                OPEN[dem++] = i;  // Them dinh vao OPEN
		                OPENED[i] = -1;   // Ðanh dau da tham
		                CHA[i] = current; // Luu cha cua dinh nay
		                drawEdgeCH(current, i, RED);
						if (mtk[i][current] == 1) {
							drawEdgeCH(i, current, RED); 
						}                      
		                visitedEdges[current][i] = 1;
		                delay(500); 
					}
				}
		}

        // Hien thi trang thai các mang luu tru len console
        printf("\nCLOSE[]: "); inmang(CLOSE, n);  
        printf("\nOPEN[]: "); inmang(OPEN, dem);
        printf("\nOPENED[]: "); inmang(OPENED, n);
        printf("\nCHA[]: "); inmang(CHA, n);
    }
    // Hien thi thong bao khong tim thay
    printf("\nKhong tim thay duong di tu %d den %d.\n", start, goal);
    settextstyle(1, 0, 2);
    setcolor(WHITE);
    outtextxy(20, 490, (char*)"DFS: Khong tim thay duong di");
    printf("\n");
}


void DFS_display() {
    setcolor(WHITE);
    settextstyle(1, 0, 2);
    outtextxy(20, 420, (char*)"Chon cach nhap: ");
    outtextxy(20, 440, (char*)"1. Enter");
    outtextxy(340, 440, (char*)"2. Click");
    int start, end;
    int choice = -1;
   	while (choice == -1) {
        if (ismouseclick(WM_LBUTTONDOWN)) {
            int x, y;
            getmouseclick(WM_LBUTTONDOWN, x, y);
            if (x >= 20 && x <= 120 && y >= 440 && y <= 460) {
                choice = 1; // Chon nhap phim
            } else if (x >= 340 && x <= 500 && y >= 440 && y <= 460) {
                choice = 2; // Chon mouse click
            }
        }
    }
    setcolor(BLACK);
    outtextxy(20, 420, (char*)"Chon cach nhap: ");
    outtextxy(20, 440, (char*)"1. Enter");
    outtextxy(340, 440, (char*)"2. Click");
    
    if (choice == 1) {
        printf("Nhap dinh bat dau: ");
        scanf("%d", &start);
        printf("Nhap dinh ket thuc: ");
        scanf("%d", &end);
        if ((start < 0 || start >= sodinh) && (end < 0 || end >= sodinh)) {
        settextstyle(1, 0, 2);
        setcolor(WHITE);
        outtextxy(20, 490, (char*)"DFS: Du lieu loi");
        waitForKeypress();
        return;  // Dung lai và không Chay DFS
    }
        dfs(start, end, sodinh);
    } else if (choice == 2) {
        start = -1, end = -1;
        settextstyle(1, 0, 2);
        setcolor(WHITE);
        outtextxy(20, 420, (char*)"Click dinh bat dau:");
        
        while (start == -1) {
            if (ismouseclick(WM_LBUTTONDOWN)) {
                int x, y;
                getmouseclick(WM_LBUTTONDOWN, x, y);
                for (int i = 0; i < sodinh; i++) {
                    if (sqrt(pow(x - td[i].x, 2) + pow(y - td[i].y, 2)) <= 20) {// cong thuc khoang cach tu chuot den toa do dinh euclid
                        start = i;
                        setcolor(YELLOW);
                        circle(td[i].x, td[i].y, 20);
                        sprintf(buffer, "Dinh: %d", td[i].label);
                        outtextxy(420, 420, buffer);
                        break;
                    }
                }
            }
        }

        setcolor(WHITE);
        outtextxy(20, 440, (char*)"Click dinh ket thuc:");
        while (end == -1) {
            if (ismouseclick(WM_LBUTTONDOWN)) {
                int x, y;
                getmouseclick(WM_LBUTTONDOWN, x, y);
                for (int i = 0; i < sodinh; i++) {
                    if (sqrt(pow(x - td[i].x, 2) + pow(y - td[i].y, 2)) <= 20) {// cong thuc khoang cach tu chuot den toa do dinh euclid
                        end = i;
                        setcolor(YELLOW);
                        circle(td[i].x, td[i].y, 20);
                        sprintf(buffer, "Dinh: %d", td[i].label);
                        outtextxy(420, 440, buffer);
                        break;
                    }
                }
            }
        }
        
        dfs(start, end, sodinh);
       
    }
     waitForKeypress();
}



void waitForKeypress() {
    settextstyle(1, 0, 2);
    setcolor(WHITE);
    outtextxy(20, 530, (char*)"Nhap phim bat ki de tiep tuc...");
    getch();
    setcolor(WHITE);
    outtextxy(20, 530, (char*)"Nhap lai phim bat ki de ket thuc...");
}
//Ham xu ly con tro chuot
void mouse() {
    int x;int y;
    //Bien danh dau hover
    bool hovered = false; bool hovered1 = false; 
	bool hovered2 = false; bool hovered3 = false; 
	bool hovered4 = false; bool hovered5 = false; 
    while (!kbhit()) {
        if (ismouseclick(WM_MOUSEMOVE)) {
            getmouseclick(WM_MOUSEMOVE, x, y);
            handleMouseHover(800, 10, 925, 60, "Load file", hovered);
            handleMouseHover(800, 90, 925, 140, "Starting", hovered1);
            handleMouseHover(800, 170, 925, 220, "Delete", hovered2);
            handleMouseHover(800, 250, 925, 300, "Reset", hovered3);
            handleMouseHover(800, 330, 925, 380, "Author", hovered4);
            handleMouseHover(800, 410, 925, 460, "Exit", hovered5);
            clearmouseclick(WM_MOUSEMOVE);
        }
        if (ismouseclick(WM_LBUTTONDOWN)) {
            getmouseclick(WM_LBUTTONDOWN, x, y);
            handleClick(x, y);
            clearmouseclick(WM_LBUTTONDOWN);
        }
    }
}

//main
int main() {
    initwindow(950, 600);
    drawframe();
    mouse(); // Chay su kien click chuot
   
    getch(); // Cho  nguoi dung bam phim bat ki de tiep tuc
    closegraph();
    return 0;
}

